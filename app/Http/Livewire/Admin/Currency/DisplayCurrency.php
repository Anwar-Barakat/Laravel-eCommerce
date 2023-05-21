<?php

namespace App\Http\Livewire\Admin\Currency;

use App\Models\Currency;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayCurrency extends Component
{
    use WithPagination;

    public $code,
        $order_by   = 'code',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(Currency $currency)
    {
        $currency->update(['is_active' => !$currency->is_active]);
    }


    public function render()
    {
        return view('livewire.admin.currency.display-currency', ['currencies' => $this->getCurrencies()]);
    }

    public function getCurrencies()
    {
        return Currency::search(trim($this->code))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}