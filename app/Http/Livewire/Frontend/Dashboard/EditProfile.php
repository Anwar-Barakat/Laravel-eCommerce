<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function submit()
    {
        $this->validate();
        $this->user->email  = Auth::user()->email;
        $this->user->save();

        toastr()->success(__('msgs.updated', ['name' => __('partials.Profile')]));
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.edit-profile');
    }

    public function rules()
    {
        return [
            'user.email'        => ['required', 'email'],
            'user.first_name'   => ['required', 'string', 'max:255'],
            'user.last_name'    => ['required', 'string', 'max:255'],
            'user.mobile'       => ['required', 'string', 'min:10', 'max:10'],
        ];
    }
}
