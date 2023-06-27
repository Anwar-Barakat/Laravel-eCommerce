<?php

namespace App\Http\Livewire\Admin\Color;

use App\Models\Color;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayColorComponent extends Component
{
    use WithPagination;

    public $name,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public Color $color;

    public function mount(Color $color)
    {
        $this->color    = $color;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->color->save();
            toastr()->success(__('msgs.submitted', ['name' => __('product.color')]));
            $this->color = new Color();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function update(Color $color)
    {
        $this->color    = $color;
    }

    public function delete(Color $color)
    {
        $color->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('product.color')]));
    }

    public function updateStatus(Color $color)
    {
        $color->update(['is_active' => !$color->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.color.display-color-component', ['colors' => $this->getColors()]);
    }

    public function rules()
    {
        return [
            'color.name'        => ['required', 'string', 'min:3', Rule::unique('colors', 'name')->ignore($this->color->id)],
            'color.is_active'   => ['required', 'boolean'],
        ];
    }

    public function getColors()
    {
        return Color::search(trim($this->name))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}