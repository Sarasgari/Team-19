<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // Get existing settings
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_email' => 'required|email|max:255',
        ]);

        $settings = Setting::first();
        if (!$settings) {
            $settings = new Setting();
        }

        $settings->site_name = $request->site_name;
        $settings->site_email = $request->site_email;
        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
