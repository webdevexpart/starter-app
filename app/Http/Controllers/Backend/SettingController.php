<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function general()
    {
        return view('backend.settings.general');
    }

    public function generalUpdate(Request $request)
    {
        $this->validate($request,[
           'site_title' => 'required|string|min:2|max:255',
           'site_description' => 'nullable|string|min:2|max:255',
           'site_address' => 'nullable|string|min:2|max:255'
        ]);

        Setting::updateOrCreate(['name' => 'site_title'], ['value' => $request->get('site_title')]);
        // Update .env
        Artisan::call("env:set APP_NAME='".$request->get('site_title')."'");

        Setting::updateOrCreate(['name' => 'site_description'], ['value' => $request->get('site_description')]);
        Setting::updateOrCreate(['name' => 'site_address'], ['value' => $request->get('site_address')]);

        notify()->success('Settings Updated.', 'Success');
        return back();
    }


    public function appearance()
    {
        return view('backend.settings.appearance');
    }

    public function appearanceUpdate(Request $request)
    {
        $this->validate($request, [
           'site_logo' => 'nullable|image',
           'site_favicon' => 'nullable|image'
        ]);

        // Upload Site Logo
        if ($request->hasFile('site_logo')) {
            $this->deleteOldLogo(setting('site_logo'));
            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_logo'))
                ]);
        }

        // Upload Site Logo
        if ($request->hasFile('site_favicon')) {
            $this->deleteOldLogo(setting('site_favicon'));
            Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_favicon'))
                ]);
        }

        notify()->success('Settings Updated.', 'Success');
        return back();
    }

    private function deleteOldLogo($path){
        Storage::disk('public')->delete($path);
    }

    public function mail()
    {
        return view('backend.settings.mail');
    }

    public function mailUpdate(Request $request)
    {
        $this->validate($request,[
            'mail_mailer' => 'nullable|string|max:255',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|string|max:255',
            'mail_username' => 'nullable|email|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255'
        ]);

        Setting::updateOrCreate(['name' => 'mail_mailer'], ['value' => $request->get('mail_mailer')]);
        Artisan::call("env:set MAIL_MAILER='".$request->get('mail_mailer')."'");

        Setting::updateOrCreate(['name' => 'mail_host'], ['value' => $request->get('mail_host')]);
        Artisan::call("env:set MAIL_HOST='".$request->get('mail_host')."'");

        Setting::updateOrCreate(['name' => 'mail_port'], ['value' => $request->get('mail_port')]);
        Artisan::call("env:set MAIL_PORT='".$request->get('mail_port')."'");

        Setting::updateOrCreate(['name' => 'mail_username'], ['value' => $request->get('mail_username')]);
        Artisan::call("env:set MAIL_USERNAME='".$request->get('mail_username')."'");

        Setting::updateOrCreate(['name' => 'mail_password'], ['value' => $request->get('mail_password')]);
        Artisan::call("env:set MAIL_PASSWORD='".$request->get('mail_password')."'");

        Setting::updateOrCreate(['name' => 'mail_encryption'], ['value' => $request->get('mail_encryption')]);
        Artisan::call("env:set MAIL_ENCRYPTION='".$request->get('mail_encryption')."'");

        Setting::updateOrCreate(['name' => 'mail_from_address'], ['value' => $request->get('mail_from_address')]);
        Artisan::call("env:set MAIL_FROM_ADDRESS='".$request->get('mail_from_address')."'");

        Setting::updateOrCreate(['name' => 'mail_from_name'], ['value' => $request->get('mail_from_name')]);
        Artisan::call("env:set MAIL_FROM_NAME='".$request->get('mail_from_name')."'");


        notify()->success('Settings Updated.', 'Success');
        return back();
    }
}
