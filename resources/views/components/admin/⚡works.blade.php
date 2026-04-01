<?php

use Livewire\Component;
use App\Models\Work;
use App\Models\Urgency;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;


new class extends Component
{
    #[Validate('required', message: 'Поле не должно быть пустым')]
    #[Validate('string', message: 'Неверный формат данных')] 
    #[Validate('unique:packages,name', message: 'Такое название уже есть')]
    #[Validate('min:3', message: 'Слишком короткое (меньше 3)')] 
    #[Validate('max:55', message: 'Слишком длинное (больше 55)')]  
    public $name = '';

    #[Validate('required', message: 'Нужно выбрать сложность')]
    public $urgen = '';

    #[Validate('required', message: 'Нужно выбрать количество страниц')]
    public $pgs = '';

    public $pages = [];
    public $works = [];
    public $urgencys = [];
    public bool $saveWorkOpen = false;
    public bool $editWorkOpen = false;
    public $workn = "";
    public $workp;
    public $worku;    
    public $workid;
    public $work;

    public function loadWorks()
    {
        $this->works = Work::get();
        $this->urgencys = Urgency::get();
    }

    public function mount()
    {
        $this->pages = ['4 - 6', '20 - 30', '25 - 35', '30 - 45', '50 - 80', '80 - 100'];
        $this->loadWorks();
    }

    public function saveWork()
    {
        $this->saveWorkOpen = true;
        $this->editWorkOpen = false;
    }

    public function openEditWork($work)
    {
        $this->workn = $work['name'];
        $this->worku = $work['urgency_id'];
        $this->workid = $work['id'];      
        $this->saveWorkOpen = false;
        $this->editWorkOpen = true;
    }

    public function closeWorkModals()
    {
        $this->saveWorkOpen = false;
        $this->editWorkOpen = false;
    }

    public function save(Work $work)
    {
        $validated = $this->validate();
        $work->name = $validated['name'];
        $work->urgency_id = $validated['urgen'];
        $work->pages = $this->pages[$validated['pgs']];
        $work->save();
        $this->name = '';
        $this->loadWorks();
        $this->closeWorkModals();
    }

    public function editWork()
    {
        $validated = $this->validate();
        $work = Work::find($this->workid);
        $work->name = $validated['name'];
        $work->urgency_id = $validated['urgen'];
        $work->pages = $this->pages[$validated['pgs']];
        $work->save();
        $this->name = '';
        $this->loadWorks();
        $this->closeWorkModals();
    }

    public function deleteWork($id)
    {
        $work = Work::where('id', $id)->get();
        $work->delete();
        $this->loadWorks();
    }
};
?>

<div wire:init="loadWorks" class="admin-section__segment">
    <div class="admin-section__segment-header">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Работы</span>
        </h3>
        <button wire:click="saveWork" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-tables">
        <div class="admin-tables__head-wrapper tables-overflow">
            <div class="admin-tables__head cell-10">ID</div>
            <div class="admin-tables__head cell-30">Название</div>
            <div class="admin-tables__head cell-20">Сложность</div>
            <div class="admin-tables__head cell-20">Страниц</div>
            <div class="admin-tables__head cell-20">Изменить</div>
        </div>
        <ul class="admin-tables__lists height-240"> 
            @if(count($works) === 0)
                Работы не созданы
            @else
                @foreach($works as $work)
                    <li class="admin-tables__list">
                        <div class="admin-tables__list-wrapper">
                            <div class="admin-tables__list-cell cell-10">{{ $work->id }}</div>
                            <div class="admin-tables__list-cell cell-30">{{ $work->name }}</div>
                            <div class="admin-tables__list-cell cell-20">{{ Urgency::where('id', $work->urgency_id)->value('name') }}</div>
                            <div class="admin-tables__list-cell cell-20">{{ $work->pages }}</div>
                            <div class="admin-tables__list-cell cell-10"><button class="cell-button" wire:click="openEditWork({{ $work }})"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Изменить работу"></button></div>
                            <div class="admin-tables__list-cell cell-10"><button class="cell-button" wire:click="deleteWork({{ $work->id }})" wire:confirm="Точно удалить {{ $work->name }}?"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить работу"></button></div>
                        </div>
                    </li>
                @endforeach
            @endif            
        </ul>
    </div>
    <div class="overlay" wire:show="saveWorkOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Добавить работу</span>
                </h3>
                <button wire:click="closeWorkModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="save">
                    @csrf
                    <label class="admin-modal__form-label" for="wrkname">Работа:</label>
                    <input id="wrkname" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="hitSaveUrgency">Выбрать сложность:</label>
                    <select class="admin-modal__form-select" id="hitSaveUrgency" wire:model="urgen">
                        @if(count($urgencys) === 0)
                            <option disabled value="">Сложность не задана</option>
                        @else
                            <option disabled value="">Раскрыть список</option>
                            @foreach($urgencys as $urgency)
                                <option wire:key="{{ $urgency->id }}" value="{{ $urgency->id }}">{{ $urgency->name }}</option>                            
                            @endforeach
                        @endif
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('urgen') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="hitSavePages">Количество страниц:</label>
                    <select class="admin-modal__form-select" id="hitSavePages" wire:model="pgs">
                        <option disabled value="">Раскрыть список</option>
                        @foreach($pages as $key => $value)
                            <option wire:key="{{ $key }}" value="{{ $key }}">{{ $value }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('pgs') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
    <div class="overlay" wire:show="editWorkOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Изменить работу</span>
                </h3>
                <button wire:click="closeWorkModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="editWork">
                    @csrf
                    <label class="admin-modal__form-label" for="wrkname">Изменить работу {{ $workn }}:</label>
                    <input id="wrkname" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="name">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="hitSaveUrgency">Выбрать сложность:</label>
                    <select class="admin-modal__form-select" id="hitSaveUrgency" wire:model="urgen">
                        <option selected value="{{ $worku }}">{{ Urgency::where('id', $worku)->value('name') }}</option>
                        @foreach($urgencys as $urgency)
                            <option wire:key="{{ $urgency->id }}" value="{{ $urgency->id }}">{{ $urgency->name }}</option>                            
                        @endforeach
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('urgen') {{ $message }} @enderror</span>
                    </div>
                    <label class="admin-modal__form-label" for="hitSavePages">Количество страниц:</label>
                    <select class="admin-modal__form-select" id="hitSavePages" wire:model="pgs">
                        <option disabled value="">Раскрыть список</option>
                        @foreach($pages as $key => $value)
                            <option wire:key="{{ $key }}" value="{{ $key }}">{{ $value }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('pgs') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
</div>