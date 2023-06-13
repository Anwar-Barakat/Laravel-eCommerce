<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ChangePassword extends Component
{
    public User $user;

    public $current_password,
        $password,
        $password_confirmation;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function updatePassword()
    {
        $this->validate();
        try {
            if (!Hash::check($this->current_password, $this->user->password)) {
                toastr()->error(__('msgs.not_valid', ['name' => __('setting.current_password')]));
                $this->reset('current_password', 'password', 'password_confirmation');
                return false;
            }

            $this->user->update(['password' => Hash::make($this->password)]);
            $this->reset('current_password');
            toastr()->success(__('msgs.updated', ['name' => __('auth.password')]));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.change-password');
    }

    public function rules()
    {
        return [
            'current_password'      => [
                'required', 'string',  'max:25',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, $this->user->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'password'      => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
