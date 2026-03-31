<?php

use Livewire\Component;
use App\Models\Chapter;
use App\Models\Discipline;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

new class extends Component
{
    #[Validate('required', message: 'Поле не должно быть пустым')]
    #[Validate('string', message: 'Неверный формат данных')] 
    #[Validate('unique:packages,name', message: 'Такое название уже есть')]
    #[Validate('min:3', message: 'Слишком короткое (меньше 3)')] 
    #[Validate('max:55', message: 'Слишком длинное (больше 55)')]  
    public $name = '';

    #[Validate('required', message: 'Не выбран раздел')]
    public $chapt = '';

    public $chapters = [];
    public $disciplines = [];
    public bool $saveDisciplineOpen = false;
    public bool $editDisciplineOpen = false;
    public $selected;
    public $discname = '';
    public $discid;

    protected function prepareForValidation($attributes) {
        if (isset($attributes['name'])) {
            $attributes['name'] = Str::ucfirst($attributes['name']);
        }
        return $attributes;
    }  

    
    public function loadDisciplines()
    {
        $this->chapters = Chapter::get();
        $this->disciplines = Discipline::get();
    }

    public function mount()
    {
        $this->loadDisciplines();
    }

    public function saveDiscipline()
    {
        $this->saveDisciplineOpen = true;
    }

    public function editDiscipline($discipline)
    {
        $this->selected = Chapter::where('id', $discipline['chapter_id'])->value('id');
        $this->discname = $discipline['name'];
        $this->discid = $discipline['id'];
        $this->editDisciplineOpen = true;
    }

    public function closeDisciplineModals()
    {
        $this->saveDisciplineOpen = false;
        $this->editDisciplineOpen = false;
    }

    public function save(Discipline $discipline)
    {
        $validated = $this->validate();
        $discipline->chapter_id = $validated['chapt'];
        $discipline->name = $validated['name'];
        $discipline->save();
        $this->name = '';
        $this->loadDisciplines();
        $this->closeDisciplineModals();
    }

    public function disciplineEdit()
    {
        $validated = $this->validate(); 
        $discipline = Discipline::find($this->discid);
        $discipline->name = $validated['name'];
        $discipline->chapter_id = $validated['chapt'];
        $discipline->save();
        $this->name = '';
        $this->loadDisciplines();
        $this->closeDisciplineModals();
    }

    public function disciplineDelete($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        $this->loadChapters();
    }
};
?>

<div class="admin-section__segment" wire:init="loadDisciplines">
    <div class="admin-section__segment-header">
        <label for="subject-volume">Выбрать раздел</label>                    
        <select class="admin-section__part-select" id="subject-volume" wire:model:live="filter">
            @if(count($chapters) === 0)
                <option disabled value="">Создайте разделы в настройках</option>
            @else
                <option disabled value="all">Выбрать раздел</option>
                @foreach($chapters as $chapter)
                    <option wire:key="{{ $loop->index }}" value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                @endforeach
            @endif
        </select>                    
        <button wire:click="saveDiscipline" class="admin-section__cell-button">Создать</button>        
    </div>    
    <div class="admin-tables">
        <div class="admin-tables__head-wrapper">
            <div class="admin-tables__head cell-id">ID</div>
            <div class="admin-tables__head cell-volume">Раздел</div>
            <div class="admin-tables__head cell-subject">Дисциплина</div>
            <div class="admin-tables__head cell-edition">Изменить</div>
        </div>
        <ul class="admin-tables__lists">  
            @if(count($disciplines) === 0)
                Дисциплины не заполнены
            @else
                @foreach($disciplines as $discipline)
                    <li class="admin-tables__list">
                        <div class="admin-tables__list-wrapper">
                            <div class="admin-tables__list-cell cell-id">{{ $discipline->id }}</div>
                            <div class="admin-tables__list-cell cell-volume">{{ Chapter::where('id', $discipline->chapter_id)->value('name') }}</div>
                            <div class="admin-tables__list-cell cell-subject">{{ $discipline->name }}</div>
                            <div class="admin-tables__list-cell cell-edit"><button wire:click="editDiscipline({{ $discipline }})" class="cell-button"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Изменить предмет"></button></div>
                            <div class="admin-tables__list-cell cell-delete"><button wire:click="disciplineDelete({{ $discipline->id }})" wire:confirm="Точно удалить {{ $discipline->name }}?" class="cell-button"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить предмет"></button></div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>        
    </div>
    <div class="overlay" wire:show="saveDisciplineOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Добавить предмет</span>
                </h3>
                <button wire:click="closeDisciplineModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="save">
                    @csrf
                    <label class="admin-modal__form-label" for="hitSaveChapter">Выбрать раздел:</label>
                    <select class="admin-modal__form-select" id="hitSaveChapter" wire:model="chapt">
                        @if(count($chapters) === 0)
                            <option disabled value="">Разделы научных предметов не созданы</option>
                        @else
                            <option disabled value="">Раскрыть список</option>
                            @foreach($chapters as $chapter)
                                <option wire:key="{{ $chapter->id }}" value="{{ $chapter->id }}">{{ $chapter->name }}</option>                            
                            @endforeach
                        @endif
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('chapterName') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="dspname">Название:</label>
                    <input id="dspname" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
    <div class="overlay" wire:show="editDisciplineOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Изменить предмет</span>
                </h3>
                <button wire:click="closeDisciplineModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>                    
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="disciplineEdit">            
                    @csrf
                    <label class="admin-modal__form-label" for="hitSaveChapter">Раздел:</label>
                    <select class="admin-modal__form-select" name="hitSaveChapter" id="hitSaveChapter" wire:model="chapt">
                        @if(count($chapters) === 0)
                            <option disabled value="">Разделы научных предметов не созданы</option>
                        @else
                                <option selected value="{{ $selected }}">{{ Chapter::where('id', $selected)->value('name') }}</option>
                            @foreach($chapters as $chapter)
                                <option wire:key="{{ $loop->index }}" value="{{ $chapter->id }}">{{ $chapter->name }}</option>                            
                            @endforeach
                        @endif
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('chapterName') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="pkgname">Новое название для {{ $discname }}: </label>
                    <input id="pkgedit" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('name') {{ $message }} @enderror</span>
                    </div>                
                    <button class="admin-modal__form-button" type="submit">Измненить</button>
                </form>                
            </div>
        </div>
    </div>
</div>