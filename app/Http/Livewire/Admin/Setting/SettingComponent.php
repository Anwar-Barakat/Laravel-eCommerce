<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingComponent extends Component
{
    use WithFileUploads;

    public Setting $setting;
    public $logo;

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateSetting()
    {
        $this->validate();
        try {
            $this->setting->save();

            if ($this->logo) {
                $this->setting->clearMediaCollection('setting');
                $this->setting->addMedia($this->logo)->toMediaCollection('setting');
            }
            $this->reset('logo');

            toastr()->success(__('msgs.updated', ['name' => __('setting.settings')]));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.setting-component');
    }

    public function rules()
    {
        return [
            'setting.name'              => ['required', 'min:3', 'max:255'],
            'setting.email'             => ['required', 'email', Rule::unique('settings', 'email')->ignore($this->setting->id)],
            'setting.mobile'            => ['required', 'min:10', 'max:10'],
            'setting.address'           => ['required', 'min:3', 'max:255'],
            'setting.mobile'            => ['required'],
            'setting.facebook_url'      => ['required'],
            'setting.instagram_url'     => ['required'],
            'setting.twitter_url'       => ['required'],
            'setting.footer'            => ['required', 'string', 'min:10'],
        ];
    }
}
