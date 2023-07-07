<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DisplayPermissionComponent extends Component
{
    use WithPagination;

    public $name,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public Permission $permission;

    public function mount(Permission $permission)
    {
        $this->permission    = $permission;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->permission->name = Str::slug(Str::lower($this->permission->name), '_');
            $this->permission->save();
            toastr()->success(__('msgs.submitted', ['name' => __('setting.permission')]));
            $this->permission = new Permission();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    public function update(Permission $permission)
    {
        $this->permission    = $permission;
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        toastr()->info(__('msgs.deleted', ['name' => __('setting.permission')]));
    }

    public function render()
    {
        return view('livewire.admin.permission.display-permission-component', ['permissions' => $this->getPermissions()]);
    }

    public function rules()
    {
        return [
            'permission.name'        => ['required', 'string', 'min:3', Rule::unique('permissions', 'name')->ignore($this->permission->id)],
        ];
    }

    public function getPermissions()
    {
        return Permission::orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
