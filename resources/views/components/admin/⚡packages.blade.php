<?php

use Livewire\Component;
use App\Models\Package;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

new class extends Component
{
    public $packages;
    public $pkgid;
    public $pkgname;
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
        $this->loadPackages();        
    }

    public function activateInnerCreate() 
    {
        $this->title = 'close';
        $this->innerCreate = '';
        $this->innerEdit = 'close';
    }

    public function activateInnerEdit($package)
    {
        $this->title = 'close';
        $this->innerCreate = 'close';
        $this->innerEdit = '';
        $this->pkgid = $package['id'];
        $this->pkgname = $package['name'];
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
        Package::create($validated);
        $this->name = '';
        $this->loadPackages();
    }

    public function packageUpdate()
    {
        $validated = $this->validate(); 
        $package = Package::find($this->pkgid);
        $package->name = $validated['name'];
        $package->save();
        $this->name = '';
        $this->loadPackages();
    }

    public function packageDelete($id)
    {
        $package = Package::find($id);
        $package->delete();
        $this->loadPackages();
    }

    public function loadPackages() {
        $this->packages = Package::get();
        $this->title = '';
        $this->innerCreate = 'close';
        $this->innerEdit = 'close';
    }
};
?>

<div class="admin-section__segment">
    <div class="admin-section__segment-header {{ $title }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Пакеты</span>
        </h3>
        <button wire:click="activateInnerCreate" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-section__segment-inner {{ $innerCreate }}">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Пакеты</span>
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
            <span class="admin-section__cell-title-text">Пакеты</span>
        </h3>
        <div class="admin-inner__form-error">
            <span class="admin-inner__form-error-text">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="admin-inner__form-wrapper">
            <form id="edit-package-form" class="admin-modal__form" wire:submit="packageUpdate" method="dialog">            
                @csrf
                <label class="admin-inner__form-label" for="pkgname">Новое название для {{ $pkgname }}: </label>
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
        @if(count($packages) === 0)
            <div class="admin-tables__lists-message">
                <span class="admin-tables__lists-message-text">Пакеты еще не созданы</span>
            </div>
        @else
            @foreach($packages as $package)                       
                <li wire:key="{{ $loop->index }}" class="admin-tables__list">
                    <div class="admin-tables__list-wrapper">
                        <div class="admin-tables__list-cell cell-id">{{ $package->id }}</div>
                        <div class="admin-tables__list-cell cell-name-big">{{ $package->name }}</div>
                        <div class="admin-tables__list-cell cell-edit"><button wire:click="activateInnerEdit({{ $package }})" class="cell-button package-edit"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Редактировать пакет"></button></div>
                        <div class="admin-tables__list-cell cell-delete"><button wire:click="packageDelete({{ $package->id }})" wire:confirm="Точно удалить {{ $package->name }}?" class="cell-button package-delete"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить пакет"></button></div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>