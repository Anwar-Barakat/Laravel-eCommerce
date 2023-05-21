<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayCategory extends Component
{
    use WithPagination;

    public $name,
        $section_id,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus($category_id)
    {
        $category  = Category::findOrFail($category_id);
        $category->update(['is_active' => !$category->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.category.display-category', ['categories' => $this->getCategories()]);
    }

    public function getCategories()
    {
        return Category::whereHas('section', function ($query) {
            $query->when($this->section_id, fn ($q) => $q->where('section_id', $this->section_id));
        })->with('section:id,name')
            ->search(trim($this->name))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
