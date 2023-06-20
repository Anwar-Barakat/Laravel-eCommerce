<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;

    public Admin $admin;
    public $logo;

    public function mount(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateInfo()
    {
        $this->validate();
        try {
            $this->admin->save();

            if ($this->logo) {
                $this->admin->clearMediaCollection('avatar');
                $this->admin->addMedia($this->logo)->toMediaCollection('avatar');
            }
            $this->reset('logo');
            toastr()->success(__('msgs.updated', ['name' => __('partials.profile')]));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.admin-profile');
    }

    public function rules()
    {
        return [
            'admin.email'     => ['required', 'email', Rule::unique('admins', 'email')->ignore($this->admin->id)],
            'admin.name'      => ['required', 'min:3'],
            'admin.bio'       => ['required', 'min:10'],
            'admin.address'   => ['required', 'min:10'],
        ];
    }
}
