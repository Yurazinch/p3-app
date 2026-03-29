<?php

use Livewire\Component;
use App\Models\Urgency;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

new class extends Component
{
    public $urgencys;
    public $urgid;
    public $urgname;
    public $title;
    public $innerCreate;
    public $innerEdit;

    #[Validate('required', message: 'Поле не должно быть пустым')]
    #[Validate('string', message: 'Неверный формат данных')] 
    #[Validate('unique:urgencys,name', message: 'Такое название уже есть')]
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
        $this->loadUrgencys();        
    }

    public function activateInnerCreate() 
    {
        $this->title = 'close';
        $this->innerCreate = '';
        $this->innerEdit = 'close';
    }

    public function activateInnerEdit($urgency)
    {
        $this->title = 'close';
        $this->innerCreate = 'close';
        $this->innerEdit = '';
        $this->urgid = $urgency['id'];
        $this->urgname = $urgency['name'];
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
        Urgency::create($validated);
        $this->name = '';
        $this->loadPackages();
    }

    public function urgencyUpdate()
    {
        $validated = $this->validate(); 
        $urgency = Urgency::find($this->urgid);
        $urgency->name = $validated['name'];
        $urgency->save();
        $this->name = '';
        $this->loadUrgencys();
    }

    public function urgencyDelete($id)
    {
        $package = Urgency::find($id);
        $package->delete();
        $this->loadUrgencys();
    }

    public function loadUrgencys() {
        $this->urgencys = Urgency::get();
        $this->title = '';
        $this->innerCreate = 'close';
        $this->innerEdit = 'close';
    }
};
?>

<div class="admin-section__segment">
    <div class="admin-section__segment-header {{ $title }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Сложность</span>
        </h3>
        <button wire:click="activateInnerCreate" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-section__segment-inner {{ $innerCreate }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Сложность</span>
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
            <span class="admin-section__cell-title-text">Сложность</span>
        </h3>
        <div class="admin-inner__form-error">
            <span class="admin-inner__form-error-text">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="admin-inner__form-wrapper">
            <form id="edit-package-form" class="admin-modal__form" wire:submit="urgencyUpdate" method="dialog">            
                @csrf
                <label class="admin-inner__form-label" for="pkgname">Новое название для {{ $urgname }}: </label>
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
        @if(count($urgencys) === 0)
            <div class="admin-tables__lists-message">
                <span class="admin-tables__lists-message-text">Уровень сложности еще не задан</span>
            </div>
        @else
            @foreach($urgencys as $urgency)                       
                <li wire:key="{{ $loop->index }}" class="admin-tables__list">
                    <div class="admin-tables__list-wrapper">
                        <div class="admin-tables__list-cell cell-id">{{ $urgency->id }}</div>
                        <div class="admin-tables__list-cell cell-name-big">{{ $urgency->name }}</div>
                        <div class="admin-tables__list-cell cell-edit"><button wire:click="activateInnerEdit({{ $urgency }})" class="cell-button package-edit"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Редактировать сложность"></button></div>
                        <div class="admin-tables__list-cell cell-delete"><button wire:click="urgencyDelete({{ $urgency->id }})" wire:confirm="Точно удалить {{ $urgency->name }}?" class="cell-button package-delete"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить сложность"></button></div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>