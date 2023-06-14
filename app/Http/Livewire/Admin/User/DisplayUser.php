<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayUser extends Component
{
    use WithPagination;

    public $first_name,
        $order_by   = 'first_name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(User $user)
    {
        $user->email_verified_at = is_null($user->email_verified_at) ? now() : null;
        $user->save();
    }

    public function render()
    {
        return view('livewire.admin.user.display-user', ['users' => $this->getUsers()]);
    }

    public function getUsers()
    {
        return User::search(trim($this->first_name))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
