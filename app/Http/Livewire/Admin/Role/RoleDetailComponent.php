<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleDetailComponent extends Component
{
    public Role $role;
    public $permissions;

    public $selectedPermissions = [];

    public function mount(Role $role)
    {
        $this->permissions          = Permission::latest()->get();
        $this->selectedPermissions  = $role->permissions->pluck('id') ?? [];
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->role->syncPermissions($this->selectedPermissions);
            toastr()->success(__('msgs.assigned', ['name' => __('setting.permissions')]));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.role.role-detail-component');
    }

    public function rules()
    {
        return [
            'selectedPermissions' => ['required']
        ];
    }
}
