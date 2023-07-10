<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminDetailComponent extends Component
{
    public Admin $admin;
    public $roles, $permissions;

    public $selectedRoles = [],
        $selectedPermissions = [];

    public function mount(Admin $admin)
    {
        $this->admin                = $admin;
        $this->roles                = Role::latest()->get();
        $this->permissions          = Permission::latest()->get();
        $this->selectedRoles        = $admin->roles->pluck('id') ?? [];
        $this->selectedPermissions  = $admin->permissions->pluck('id') ?? [];
    }

    public function submitRole()
    {
        $this->validate(['selectedRoles'    => ['required']]);
        try {
            $this->admin->syncRoles($this->selectedRoles);
            toastr()->success(__('msgs.assigned', ['name' => __('setting.roles')]));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function submitPermission()
    {
        $this->validate(['selectedPermissions'   => ['required']]);
        try {
            $this->admin->syncPermissions($this->selectedPermissions);
            toastr()->success(__('msgs.assigned', ['name' => __('setting.permissions')]));
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.admin-detail-component');
    }
}
