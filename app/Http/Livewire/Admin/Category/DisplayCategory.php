<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayCategory extends Component
{
    use WithPagination;

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
        return Category::latest()->paginate(CUSTOMPAGINATION);
    }
}
