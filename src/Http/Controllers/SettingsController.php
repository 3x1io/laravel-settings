<?php

namespace IO3x1\LaravelSettings\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use IO3x1\LaravelSettings\Models\Setting;

class SettingsController extends Controller
{


    public function index()
    {
        return view('laravel-settings::home');
    }

    public function save(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'site_description' => 'required',
            'site_keywords' => 'required'
        ]);

        setting_update('site.name', $request->get('site_name'));
        setting_update('site.description', $request->get('site_description'));
        setting_update('site.keywords', $request->get('site_keywords'));

        $logo = $request->file('site_logo');
        if($logo){
            $imageName = time().'.'.$request->site_logo->extension();
            $request->site_logo->move(public_path('images/settings'), $imageName);
            setting_update('site.logo', '/images/settings/'. $imageName);
        }

        toast(trans('laravel-settings::admin.index.message.success'), 'success');
        return back();
    }

    public function get(Request $request){
        if($request->has('search')){
            $settings = Setting::where('key', 'LIKE', '%' .$request->get('search') .'%')->paginate(10);
        }
        else {
            $settings = Setting::paginate(10);
        }


        return view('laravel-settings::generator.index', [
            'settings' => $settings
        ]);
    }

    public function create(){
        return view('laravel-settings::generator.create');
    }

    public function store(Request $request){
        $request->validate([
            'key' => 'required',
            'value' => 'required'
        ]);

        $check = Setting::where('key', $request->key)->first();
        if(!$check){
            $getSettings = new Setting();
            $getSettings->key = $request->get('key');
            $getSettings->value = $request->get('value');
            $getSettings->group = $request->get('group');
            $getSettings->save();
        }

        toast(trans('laravel-settings::admin.index.message.success'), 'success');
        return redirect()->to('settings/get');
    }

    public function edit($setting){

        $setting = Setting::find($setting);
        return view('laravel-settings::generator.edit', [
            'setting' => $setting
        ]);
    }

    public function update(Request $request, $setting){
        $request->validate([
            'key' => 'required',
            'value' => 'required'
        ]);

        $getSettings = Setting::find($setting);
        $getSettings->key = $request->get('key');
        $getSettings->value = $request->get('value');
        $getSettings->group = $request->get('group');
        $getSettings->save();

        toast(trans('laravel-settings::admin.index.message.success'), 'success');
        return redirect()->to('settings/get');
    }

    public function destroy($setting){
        Setting::find($setting)->delete();

        toast(trans('laravel-settings::admin.index.message.success'), 'success');
        return redirect()->to('settings/get');
    }
}
