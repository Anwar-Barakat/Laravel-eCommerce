<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayAdminComponent extends Component
{
    use WithPagination;

    public $name,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(Admin $admin)
    {
        $admin->email_verified_at = is_null($admin->email_verified_at) ? now() : null;
        $admin->save();
    }

    public function render()
    {
        return view('livewire.admin.admin.display-admin-component', ['admins' => $this->getAdmins()]);
    }

    public function getAdmins()
    {
        return Admin::search(trim($this->name))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}