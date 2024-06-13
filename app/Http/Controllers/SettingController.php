<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\storage\StoreFactory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    protected $file;
    function __construct()
    {
        $this->file = (new StoreFactory)->initialize();
    }
    function index()
    {
        $settingSystem = json_decode(Setting::where('key', 'setting_system')->first()?->value, true) ?? [];
        return view('pages.setting.web', ['settingSystem' => $settingSystem]);
    }
    function info()
    {
        $info = Setting::where('key', '=', 'info_contact')->first();
        $settingInfo  = json_decode($info->value, true);
        return view('pages.setting.info', ['settingInfo' => $settingInfo]);
    }
    function UpdateInfo(Request $req)
    {
        try {
            Setting::updateOrCreate(['key' => 'info_contact'], ['key' => 'info_contact', 'value' => json_encode($req->info)]);
            return back()->with('message', ['content' => ' đã cập nhập thông website', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => ' cập nhập thông website thất bại', 'type' => 'error']);
        }
    }
    function createSystem(Request $req)
    {
        try {
            $settingSystemCode =  'setting_system';
            $settingSystem = json_decode(Setting::where('key', $settingSystemCode)->first()?->value, true) ?? [];
            $setting = [
                'title_website' => $req->title_website,
                'timezone' => $req->timezone,
                'language' => $req->language,
            ];
            if (!empty($req->logo)) {
                $this->file->deletePath($settingSystem['logo']);
                $path = $this->file->uploadImage($req->logo, 'system');
                $setting['logo'] = $path;
            } else {
                $setting['logo'] = $settingSystem['logo'];
            }
            if (!empty($req->icon_title_website)) {
                $this->file->deletePath($settingSystem['icon_title_website']);
                $path = $this->file->uploadImage($req->icon_title_website, 'system');
                $setting['icon_title_website'] = $path;
            } else {
                $setting['icon_title_website'] = $settingSystem['icon_title_website'];
            }
            $setting = Setting::updateOrCreate(['key' =>    $settingSystemCode], ['key' => $settingSystemCode, 'value' => json_encode($setting)]);
            session()->put($settingSystemCode, json_decode($setting->value, true));
            return back()->with('message', ['content' => 'đã cập nhập thông website', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => ' cập nhập thông website thất bại', 'type' => 'error']);
        }
    }
    function payment()
    {
        $payment = Setting::where('key', '=', 'payment')->first();
        $payment = json_decode($payment->value, true);
        return view('pages.setting.payment', ['payment' => $payment]);
    }
    function savePayment(Request $req)
    {
        try {
            Setting::updateOrCreate(['key' => 'payment'], ['key' => 'payment', 'value' => json_encode($req->payment)]);
            return back()->with('message', ['content' => 'đã lưu thông tinh', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => ' cập nhập thông website thất bại', 'type' => 'error']);
        }
    }
    function backup()
    {
        $filesBackup = File::allFiles(storage_path('app/laravel'));
        return view('pages.setting.backup', ['filesBackup' => $filesBackup]);
    }
}
