<?php

namespace App\Http\Livewire\Admin\Currency;

use App\Models\Currency;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddEditCurrency extends Component
{
    public Currency $currency;

    public $name_ar, $name_en;

    public function mount(Currency $currency)
    {
        $this->currency              = $currency;
        $this->name_ar  = $currency->getTranslation('name', 'ar');
        $this->name_en  = $currency->getTranslation('name', 'en');
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->currency->name = [
                'ar' => $this->name_ar,
                'en' => $this->name_en,
            ];

            $this->currency->save();
            toastr()->success(__('msgs.submitted', ['name' => __('order.currency')]));
            return redirect()->route('admin.currencies.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.currency.add-edit-currency');
    }


    public function rules()
    {
        return [
            'name_ar'               => [
                'required', 'string', 'min:3',
                Rule::unique('currencies', 'name->ar')->ignore($this->currency->id)
            ],
            'name_en'               => [
                'required', 'string', 'min:3',
                Rule::unique('currencies', 'name->en')->ignore($this->currency->id)
            ],
            'currency.code'          => ['required', 'min:3'],
            'currency.exchange_rate' => ['required', 'numeric'],
            'currency.is_active'     => ['required', 'boolean'],
        ];
    }
}
