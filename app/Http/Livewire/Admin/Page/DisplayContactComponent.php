<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayContactComponent extends Component
{
    use WithPagination;

    public $subject,
        $order_by   = 'name',
        $sort_by    = 'asc',
        $per_page   = CUSTOMPAGINATION;

    public function updateStatus(ContactUs $contact)
    {
        $contact->update(['is_active' => !$contact->is_active]);
    }

    public function render()
    {
        return view('livewire.admin.page.display-contact-component', ['contacts' => $this->getContacts()]);
    }

    public function getContacts()
    {
        return ContactUs::search(trim($this->subject))
            ->orderBy($this->order_by, $this->sort_by)
            ->paginate($this->per_page);
    }
}
