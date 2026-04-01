<?php

use Livewire\Component;
use App\Models\Correction;
use App\Models\Urgency;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required', message: 'Нужно выбрать срок выполнения')]
    public $term;

    #[Validate('required', message: 'Нужно выбрать сложность')]
    public $urg;

    #[Validate('required', message: 'Корректировка не указана')]    
    #[Validate('decimal:0,2', message: 'Введите число не более чем с 2 десятичными знаками')]   
    public $correct;

    public $terms = [];
    public $urgencys = [];
    public $corrections = [];
    public bool $saveCorrectionOpen = false;
    public bool $editCorrectionOpen = false;
    public $correction_id;
    public $exist_term;
    public $exist_urgency_id;

    protected function prepareForValidation($attributes) {        
        if (isset($attributes['correct'])) { 
            $attributes['correct'] = Str::replace(',', '.', $attributes['correct']);
            $attributes['correct'] = Number::parseFloat($attributes['correct']);
         }
        return $attributes;
    }

    public function loadCorrections()
    {
        $this->urgencys = Urgency::get();
        $this->corrections = Correction::get();
    }

    public function mount()
    {
        $this->terms = [30, 21, 14, 7, 6, 1];
        $this-> loadCorrections();
    }

    public function openSaveCorrection()
    {
        $this->saveCorrectionOpen = true;
        $this->editCorrectionOpen = false;
    }

    public function openEditCorrection($correction)
    {
        $this->correction_id = $correction['id'];
        $this->exist_term = $correction['term'];
        $this->exist_urgency_id = $correction['urgency_id'];
        $this->saveCorrectionOpen = false;
        $this->editCorrectionOpen = true;
    }

    public function closeCorrectionModals()
    {
        $this->saveCorrectionOpen = false;
        $this->editCorrectionOpen = false;
    }

    public function save(Correction $correction)
    {
        $validated = $this->validate();
        $correction->term = $validated['term'];
        $correction->urgency_id = $validated['urg'];
        $correction->correct = $validated['correct'];
        $correction->save();
        $this->loadCorrections();
        $this->closeCorrectionModals();
    }

    public function editCorrection()
    {
        $validated = $this->validate();
        $correction = Correction::find($this->correction_id);
        $correction->term = $validated['term'];
        $correction->urgency_id = $validated['urg'];
        $correction->correct = $validated['correct'];
        $correction->save();
        $this->loadCorrections();
        $this->closeCorrectionModals();
    }

    public function deleteCorrection($id)
    {
        $correction = Correction::find($id);
        $correction->delete();
        $this->loadCorrections();
    }
};
?>

<div class="admin-section__segment" wire:init="loadCorrections">
    <div class="admin-section__segment-header">
        <h3 class="admin-section__cell-title">
            <span class="admin-section__cell-title-text">Срочность</span>
        </h3>
        <!--<select class="admin-section__part-select" name="complexity">
            <option class="admin-section__part-select-option">Выбрать сложность</option>
        </select>-->
        <button wire:click="openSaveCorrection" class="admin-section__cell-button">Создать</button>
    </div>
    <div class="admin-tables">
        <div class="admin-tables__head-wrapper tables-overflow">
            <div class="admin-tables__head cell-id">ID</div>
            <div class="admin-tables__head cell-term">Срок исполнения дней, не более</div>
            <div class="admin-tables__head cell-complexity">Сложность</div>
            <div class="admin-tables__head cell-correction">Коэффициент</div>
            <div class="admin-tables__head cell-edition">Изменить</div>
        </div>
        <ul class="admin-tables__lists height-240">
            @if(count($corrections) === 0)
                Сроки исполнения не заданы
            @else
                @foreach($corrections as $correction)
                    <li wire:key="{{ $loop->index }}" class="admin-tables__list">
                        <div class="admin-tables__list-wrapper">
                            <div class="admin-tables__list-cell cell-id">{{ $correction->id }}</div>
                            <div class="admin-tables__list-cell cell-term">{{ $terms[$correction->term] }}</div>
                            <div class="admin-tables__list-cell cell-complexity">{{ Urgency::where('id', $correction->urgency_id)->value('name') }}</div>
                            <div class="admin-tables__list-cell cell-correction">{{ $correction->correct }}</div>
                            <div class="admin-tables__list-cell cell-edit"><button class="cell-button" wire:click="openEditCorrection({{ $correction }})"><img src="{{ asset('storage/img/pen_edit_icon.webp') }}" alt="Изменить срок"></button></div>
                            <div class="admin-tables__list-cell cell-delete"><button class="cell-button" wire:click="deleteCorrection({{ $correction->id }})" wire:confirm="Точно удалить коррекцию {{ $correction->id }}?"><img src="{{ asset('storage/img/basket_trash_icon.webp') }}" alt="Удалить срок"></button></div>
                        </div>                            
                    </li>
                @endforeach
            @endif            
        </ul>
    </div>
    <div class="overlay" wire:show="saveCorrectionOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Добавить срок выполнения</span>
                </h3>
                <button wire:click="closeCorrectionModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="save">
                    @csrf  
                    <label class="admin-modal__form-label" for="hitSaveTerms">Срок выполнения работы, дней, не более:</label>
                    <select class="admin-modal__form-select" id="hitSaveTerms" wire:model="term">
                        <option value="">Раскрыть список</option>
                        @foreach($terms as $key => $value)
                            <option wire:key="{{ $key }}" value="{{ $key }}">{{ $value }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('term') {{ $message }} @enderror</span>
                    </div>                  
                    <label class="admin-modal__form-label" for="putSaveUrgency">Выбрать сложность:</label>
                    <select class="admin-modal__form-select" id="putSaveUrgency" wire:model="urg">
                        @if(count($urgencys) === 0)
                            <option disabled value="">Сложность не задана</option>
                        @else
                            <option value="">Раскрыть список</option>
                            @foreach($urgencys as $urgency)
                                <option wire:key="{{ $urgency->id }}" value="{{ $urgency->id }}">{{ $urgency->name }}</option>                            
                            @endforeach
                        @endif
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('urg') {{ $message }} @enderror</span>
                    </div>                    
                    <label class="admin-modal__form-label" for="corname">Корректировка стоимости:</label>
                    <input id="corname" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="correct">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('correct') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
    <div class="overlay" wire:show="editCorrectionOpen">
        <div class="admin-section__segment-modal">
            <div class="admin-section__modal-header">
                <h3 class="admin-section__modal-title">
                    <span class="admin-section__modal-title-text">Изменить срок выполнения {{ $exist_term }}</span>
                </h3>
                <button wire:click="closeCorrectionModals" class="admin-section__modal-close"><img class="admin-section__modal-cross" src="{{ asset('storage/img/close-cross.png') }}" alt="Закрыть окно"></button>
            </div>        
            <div class="admin-modal__form-wrapper">
                <form class="admin-modal__form" wire:submit="editCorrection">
                    @csrf  
                    <label class="admin-modal__form-label" for="hitSaveTerms">Уточните срок выполнения:</label>
                    <select class="admin-modal__form-select" id="hitSaveTerms" wire:model="term">
                        <option selected value="">{{ $exist_term }}</option>
                        @foreach($terms as $key => $value)
                            <option wire:key="{{ $key }}" value="{{ $key }}">{{ $value }}</option>                           
                        @endforeach                       
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('term') {{ $message }} @enderror</span>
                    </div>                  
                    <label class="admin-modal__form-label" for="putSaveUrgency">Уточните сложность:</label>
                    <select class="admin-modal__form-select" id="putSaveUrgency" wire:model="urg">
                        <option selected value="">{{ Urgency::where('id', $exist_urgency_id)->value('name') }}</option>
                        @foreach($urgencys as $urgency)
                            <option wire:key="{{ $urgency->id }}" value="{{ $urgency->id }}">{{ $urgency->name }}</option>                            
                        @endforeach                        
                    </select>
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('urg') {{ $message }} @enderror</span>
                    </div>                    
                    <label class="admin-modal__form-label" for="corname">Корректировка стоимости:</label>
                    <input id="corname" class="admin-modal__form-input" type="text" autocomplete="off" value="" wire:model="correct">
                    <div class="admin-modal__form-error">
                        <span class="admin-modal__form-error-text">@error('correct') {{ $message }} @enderror</span>
                    </div>
                    <button class="admin-modal__form-button" type="submit">Сохранить</button>            
                </form> 
            </div>
        </div>
    </div>
</div>