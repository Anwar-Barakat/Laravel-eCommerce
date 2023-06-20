<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddEditCoupon extends Component
{
    public Coupon $coupon;
    public $categories = [];
    public $selectedCategories = [];


    public function mount(Coupon $coupon)
    {
        $this->coupon               = $coupon;
        $this->categories           = Category::with('subCategories:id,name,parent_id')->select('id', 'name', 'parent_id')->activeParent()->get();
        $this->selectedCategories   = $coupon->categories ?? [];
    }

    public function submit()
    {
        $this->validate();
        try {
            if ($this->coupon->option == 1)
                $this->coupon->code     = bin2hex(random_bytes(5));

            $this->coupon->categories   = $this->selectedCategories;
            $this->coupon->save();
            toastr()->success(__('msgs.submitted', ['name' => __('product.coupon')]));
            return redirect()->route('admin.coupons.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.coupons.index')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.coupon.add-edit-coupon', ['coupon' => $this->coupon]);
    }

    public function rules()
    {
        return [
            'coupon.option'         => ['required', 'boolean'],
            'coupon.code'           => [
                'required_if:coupon.option,0', 'nullable', 'min:10', 'max:10'
            ],
            'coupon.is_active'      => ['required', 'boolean'],
            'coupon.type'           => ['required', 'boolean'],
            'coupon.amount_type'    => ['required', 'boolean'],
            'coupon.expiry_date'    => ['required', 'date'],
            'coupon.amount'         => ['required', 'numeric', 'between:1,50', function ($value) {
                if ($this->coupon->amount_type  == '0' && $this->coupon->amount  >= 50) {
                    toastr()->error(__('product.must_be_less_than_value', ['name' => __('product.amount'), 'value' => 50]));
                    $this->coupon->amount = 0;
                }
            }],
            'selectedCategories'    => ['required', 'array'],

        ];
    }
}
