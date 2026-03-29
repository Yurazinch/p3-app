<?php

use Livewire\Component;
use App\Models\Chapter;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

new class extends Component
{
    public $chapters;
    public $cptid;
    public $cptname;
    public $title;
    public $innerCreate;
    public $innerEdit;

    #[Validate('required', message: 'Поле не должно быть пустым')]
    #[Validate('string', message: 'Неверный формат данных')] 
    #[Validate('unique:packages,name', message: 'Такое название уже есть')]
    #[Validate('min:3', message: 'Слишком короткое')] 
    #[Validate('max:10', message: 'Больше 10 символов')]  
    public $name = '';

    protected function prepareForValidation($attributes) {        
        if (isset($attributes['name'])) {
            $attributes['name'] = Str::upper($attributes['name']);
        }
        return $attributes;
    }    
    
    public function mount()
    {
        $this->loadChapters();        
    }

    public function activateInnerCreate() 
    {
        $this->title = 'close';
        $this->innerCreate = '';
        $this->innerEdit = 'close';
    }

    public function activateInnerEdit($chapter)
    {
        $this->title = 'close';
        $this->innerCreate = 'close';
        $this->innerEdit = '';
        $this->cptid = $chapter['id'];
        $this->cptname = $chapter['name'];
    }

    public function deActivateInners() 
    {
        $this->title = '';
        $this->innerCreate = 'close';
        $this->innerEdit = 'close';
    }

    public function save()
    {
        $validated = $this->validate();
        Chapter::create($validated);
        $this->name = '';
        $this->loadChapters();
    }

    public function chapterUpdate()
    {
        $validated = $this->validate(); 
        $chapter = Chapter::find($this->cptid);
        $chapter->name = $validated['name'];
        $chapter->save();
        $this->name = '';
        $this->loadChapters();
    }

    public function chapterDelete($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        $this->loadChapters();
    }

    public function loadChapters() {
        $this->chapters = Chapter::get();
        $this->title = '';
        $this->innerCreate = 'close';
        $this->innerEdit = 'close';
    }
};
?>

<div class="admin-section__segment">
    <div class="admin-section__segment-header {{ $title }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Разделы</span>
        </h3>
        <button wire:click="activateInnerCreate" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-section__segment-inner {{ $innerCreate }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Разделы</span>
        </h3>
        <div class="admin-inner__form-error">
            <span class="admin-inner__form-error-text">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="admin-inner__form-wrapper">
            <form class="admin-inner__form" wire:submit="save">
                @csrf
                <label class="admin-inner__form-label" for="pkgname">Название:</label>
                <input id="pkgname" class="admin-inner__form-input" type="text" autocomplete="off" value="" wire:model="name">
                <button class="admin-inner__form-button" type="submit">Сохранить</button>            
            </form>            
            <button wire:click="deActivateInners" class="admin-inner__close"><img class="admin-inner__cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
        </div>
    </div>
    <div class="admin-section__segment-inner {{ $innerEdit }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Разделы</span>
        </h3>
        <div class="admin-inner__form-error">
            <span class="admin-inner__form-error-text">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="admin-inner__form-wrapper">
            <form id="edit-package-form" class="admin-modal__form" wire:submit="chapterUpdate" method="dialog">            
                @csrf
                <label class="admin-inner__form-label" for="pkgname">Новое название для {{ $cptname }}: </label>
                <input id="pkgedit" class="admin-inner__form-input" type="text" autocomplete="off" value="" wire:model="name">                
                <button class="admin-inner__form-button" type="submit">Измненить</button>
            </form>
            <button wire:click="deActivateInners" class="admin-inner__close"><img class="admin-inner__cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
        </div>
    </div>
    <div class="admin-tables">
        <div class="admin-tables__head-wrapper">
            <div class="admin-tables__head cell-id">ID</div>
            <div class="admin-tables__head cell-name-big">Название</div>
            <div class="admin-tables__head cell-edition">Изменить</div>
        </div>
    </div>
    <ul class="admin-tables__lists height-130"> 
        @if(count($chapters) === 0)
            <div class="admin-tables__lists-message">
                <span class="admin-tables__lists-message-text">Разделы еще не созданы</span>
            </div>
        @else
            @foreach($chapters as $chapter)                       
                <li wire:key="{{ $loop->index }}" class="admin-tables__list">
                    <div class="admin-tables__list-wrapper">
                        <div class="admin-tables__list-cell cell-id">{{ $chapter->id }}</div>
                        <div class="admin-tables__list-cell cell-name-big">{{ $chapter->name }}</div>
                        <div class="admin-tables__list-cell cell-edit"><button wire:click="activateInnerEdit({{ $chapter }})" class="cell-button package-edit"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Редактировать раздел"></button></div>
                        <div class="admin-tables__list-cell cell-delete"><button wire:click="chapterDelete({{ $chapter->id }})" wire:confirm="Точно удалить {{ $chapter->name }}?" class="cell-button package-delete"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить раздел"></button></div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>