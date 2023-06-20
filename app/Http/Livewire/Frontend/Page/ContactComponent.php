<?php

namespace App\Http\Livewire\Frontend\Page;

use App\Models\ContactUs;
use Livewire\Component;

class ContactComponent extends Component
{
    public ContactUs $contact;

    public function mount(ContactUs $contact)
    {
        $this->contact = $contact ?? ContactUs::make();
    }

    public function sendMessage()
    {
        $this->validate();
        $this->contact->save();
        toastr()->success(__('msgs.sent', ['name' => __('frontend.message')]));
        $this->contact = new ContactUs();
    }

    public function render()
    {
        return view('livewire.frontend.page.contact-component');
    }

    public function rules()
    {
        return [
            'contact.name'      => ['required', 'min:3', 'max:255'],
            'contact.email'     => ['required', 'email'],
            'contact.subject'   => ['required', 'min:3', 'max:255'],
            'contact.message'   => ['required', 'min:3', 'max:255'],
        ];
    }
}