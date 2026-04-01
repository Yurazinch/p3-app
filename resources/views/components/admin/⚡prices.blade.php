<?php

use Livewire\Component;
use App\Models\Price;
use App\Models\Package;
use App\Models\Work;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required', message: 'Нужно выбрать пакет')]
    public $pack;

    #[Validate('required', message: 'Нужно выбрать работу')]
    public $wrk;

    #[Validate('required', message: 'Нужно указать стоимость')]
    #[Validate('integer', message: 'Должно быть целое число')]
    public $wrkct;

    public $prices = [];
    public $packages = [];
    public $works = [];
    public bool $savePriceOpen = false;
    public bool $editPriceOpen = false;
    public $exist_id;
    public $exist_pkg;
    public $exist_wrk;

    public function loadPrices()
    {
        $this->prices = Price::get();
        $this->packages = Package::get();
        $this->works = Work::get();
    }

    public function mount()
    {
        $this->loadPrices();
    }

    public function openSavePrice()
    {
        $this->savePriceOpen = true;
        $this->editPriceOpen = false;
    }

    public function openEditPrice($price)
    {
        $this->exist_id = $price['id'];
        $this->exist_pkg = $price['package_id'];
        $this->exist_wrk = $price['work_id'];
        $this->savePriceOpen = false;
        $this->editPriceOpen = true;
    }

    public function closePriceModals()
    {
        $this->savePriceOpen = false;
        $this->editPriceOpen = false;
    }

    public function save(Price $price)
    {
        $validated = $this->validate();
        $price->package_id = $validated['pack'];
        $price->work_id = $validated['wrk'];
        $price->cost = $validated['wrkct'];
        $price->save();
        $this->loadPrices();
        $this->closePriceModals();
    }

    public function editPrice()
    {
        $validated = $this->validate();
        $price = Price::find($this->exist_id);
        $price->package_id = $validated['pack'];
        $price->work_id = $validated['wrk'];
        $price->cost = $validated['wrkct'];
        $price->save();
        $this->loadPrices();
        $this->closePriceModals();
    }

    public function deletePrice($id)
    {
        $price = Price::find($id);
        $price->delete();
    }
};
?>

<div class="admin-section__segment">
    <div class="admin-section__segment-header">
        <select class="admin-section__part-select" name="making">
            <option class="admin-section__part-select-option">Выбрать работу</option>
        </select>
        <button wire:click="openSavePrice" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-tables">
        <div class="admin-tables__head-wrapper tables-overflow">
            <div class="admin-tables__head cell-id">ID</div>
            <div class="admin-tables__head cell-10">Пакет</div>
            <div class="admin-tables__head cell-50">Работа</div>
            <div class="admin-tables__head cell-10">Цена</div>
            <div class="admin-tables__head cell-20">Изменить</div>
        </div>
        <ul class="admin-tables__lists width-520">
            @if(count($prices) === 0)
                Цены не заданы
            @else
                @foreach($prices as $price)                
                    <li class="admin-tables__list">
                        <div class="admin-tables__list-wrapper">
                            <div class="admin-tables__list-cell cell-id">{{ $price->id }}</div>
                            <div class="admin-tables__list-cell cell-10">{{ Package::where('id', $price->package_id)->value('name') }}</div>
                            <div class="admin-tables__list-cell cell-50">{{ Work::where('id', $price->work_id)->value('name') }}</div>
                            <div class="admin-tables__list-cell cell-10">{{ $price->cost }}</div>
                            <div class="admin-tables__list-cell cell-10"><button class="cell-button" wire:click="openEditPrice({{ $price }})"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Редактировать цену"></button></div>
                            <div class="admin-tables__list-cell cell-10"><button class="cell-button" wire:click="deletePrice({{ $price->id }})" wire:confirm="Точно удалить цену {{ $price->id }}?"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить цену"></button></div>
                        </div>                            
                    </li>
                @endforeach
            @endif            
        </ul>
    </div>
    <div class="overlay" wire:show="savePriceOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Добавить стоимость</span>
                </h3>
                <button wire:click="closePriceModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="save">
                    @csrf  
                    <label class="admin-modal__form-label" for="hitSavePack">Пакет:</label>
                    <select class="admin-modal__form-select" id="hitSavePacks" wire:model="pack">
                        <option value="">Раскрыть список</option>
                        @foreach($packages as $package)
                            <option wire:key="{{ $loop->index }}" value="{{ $package->id }}">{{ $package->name }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('pack') {{ $message }} @enderror</span>
                    </div>                  
                    <label class="admin-modal__form-label" for="putSaveWrk">Выбрать сложность:</label>
                    <select class="admin-modal__form-select" id="putSaveWrk" wire:model="wrk">
                        @if(count($works) === 0)
                            <option disabled value="">Сложность не задана</option>
                        @else
                            <option value="">Раскрыть список</option>
                            @foreach($works as $work)
                                <option wire:key="{{ $loop->index }}" value="{{ $work->id }}">{{ $work->name }}</option>                            
                            @endforeach
                        @endif
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('wrk') {{ $message }} @enderror</span>
                    </div>                    
                    <label class="admin-modal__form-label" for="work-cost">Стоимость:</label>
                    <input id="work-cost" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="wrkct">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('wrkct') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
    <div class="overlay" wire:show="editPriceOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Добавить стоимость</span>
                </h3>
                <button wire:click="closePriceModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="editPrice">
                    @csrf  
                    <label class="admin-modal__form-label" for="hitSavePack">Уточнить пакет:</label>
                    <select class="admin-modal__form-select" id="hitSavePacks" wire:model="pack">
                        <option value="{{ $exist_pkg }}">{{ Package::where('id', $exist_pkg)->value('name') }}</option>
                        @foreach($packages as $package)
                            <option wire:key="{{ $loop->index }}" value="{{ $package->id }}">{{ $package->name }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('pack') {{ $message }} @enderror</span>
                    </div>                  
                    <label class="admin-modal__form-label" for="putSaveWrk">Уточнить сложность:</label>
                    <select class="admin-modal__form-select" id="putSaveWrk" wire:model="wrk">
                        <option value="{{ $exist_wrk }}">{{ Work::where('id', $exist_wrk)->value('name') }}</option>
                        @foreach($works as $work)
                            <option wire:key="{{ $loop->index }}" value="{{ $work->id }}">{{ $work->name }}</option>                            
                        @endforeach                        
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('wrk') {{ $message }} @enderror</span>
                    </div>                    
                    <label class="admin-modal__form-label" for="work-cost">Новая стоимость:</label>
                    <input id="work-cost" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="wrkct">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('wrkct') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
</div>