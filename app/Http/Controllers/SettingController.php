<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()->paginate(5);
    
        return view('admin.settings.index',compact('settings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit',compact('setting'));
    }

    public function update(Request $request, setting $setting)
    {
        $request->validate([
           
        ]);
  
        $input = $request->all();
        $setting->update($input);
        return redirect()->route('settings.index')
                        ->with('success','Your setting updated successfully');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
     
        return redirect()->route('settings.index')
                        ->with('success','setting deleted successfully');
    }
  
}
