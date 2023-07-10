<?php

namespace App\Http\Livewire\Admin\Role;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DisplayRoleComponent extends Component
{
    use WithPagination;

    public $name,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public Role $role;

    public function mount(Role $role)
    {
        $this->role    = $role;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->role->name = Str::slug(Str::lower($this->role->name), '_');
            $this->role->save();
            toastr()->success(__('msgs.submitted', ['name' => __('setting.role')]));
            $this->role = new Role();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function update(Role $role)
    {
        $this->role    = $role;
    }

    public function delete(Role $role)
    {
        $role->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('setting.role')]));
    }

    public function render()
    {
        return view('livewire.admin.role.display-role-component', ['roles' => $this->getRoles()]);
    }

    public function rules()
    {
        return [
            'role.name'        => ['required', 'string', 'min:3', Rule::unique('roles', 'name')->ignore($this->role->id)],
        ];
    }

    public function getRoles()
    {
        $main_roles  = ['supervisor', 'general_manager', 'product_manager', 'order_manager', 'blog_manager'];
        return Role::whereNotIn('name', $main_roles)
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}