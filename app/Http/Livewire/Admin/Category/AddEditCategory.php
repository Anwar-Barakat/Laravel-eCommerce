<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddEditCategory extends Component
{
    use WithFileUploads;

    public Category $category;

    public $categories = [],
        $name_ar, $name_en, $image;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name_ar  = $category->getTranslation('name', 'ar');
        $this->name_en  = $category->getTranslation('name', 'en');
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function updatedCategoryNameEn()
    {
        $this->category->url = Str::slug($this->name_en, '-');
    }

    public function updatedCategorySectionId()
    {
        $this->categories = Category::with('subCategories')->where(['section_id' => $this->category->section_id, 'parent_id' => 0])->where('id', '!=', $this->category->id)->get();
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->category->name = [
                'ar' => $this->name_ar,
                'en' => $this->name_ar,
            ];
            $this->category->url = Str::slug($this->name_en, '-');
            $this->category->save();

            if ($this->image) {
                $this->category->clearMediaCollection('categories');
                $this->category->addMedia($this->image)->toMediaCollection('categories');
            }

            toastr()->success(__('msgs.submitted', ['name' => __('category.category')]));
            return redirect()->route('admin.categories.index');
        } catch (\Throwable $th) {
            return redirect()->route('admin.categories.create')->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.category.add-edit-category', ['sections' => Section::latest()->get()]);
    }

    public function rules()
    {
        return [
            'name_ar'               => [
                'required',
                'string',
                'min:3',
                Rule::unique('categories', 'name->ar')->ignore($this->category->id)
            ],
            'name_en'               => [
                'required', 'string', 'min:3',
                Rule::unique('categories', 'name->en')->ignore($this->category->id)
            ],
            'category.is_active'        => ['required', 'boolean'],
            'category.discount'         => ['required', 'numeric', 'between:1,50'],
            'category.parent_id'        => ['required', 'integer'],
            'category.section_id'       => ['required', 'integer'],
            'category.description'      => ['required', 'min:10'],
            'category.meta_title'       => ['required', 'min:10'],
            'category.meta_description' => ['required', 'min:10'],
            'category.meta_keywords'    => ['required', 'min:10'],
        ];
    }
}
