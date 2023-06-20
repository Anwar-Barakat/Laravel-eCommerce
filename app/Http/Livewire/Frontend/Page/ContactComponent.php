<?php

namespace App\Http\Livewire\Frontend\Page;

use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;
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
        try {

            if (!Auth::check()) {
                toastr()->info(__('frontend.you_must_be_logged_in'));
                return redirect()->route('login');
            }

            $this->contact->save();
            toastr()->success(__('msgs.sent', ['name' => __('frontend.message')]));
            $this->contact = new ContactUs();
        } catch (\Throwable $th) {
            return redirect()->route('frontend.pages.contact')->with(['error' => $th->getMessage()]);
        }
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