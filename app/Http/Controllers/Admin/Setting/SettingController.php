<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\Setting;
use App\Support\ImageSupport;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $foldername = 'backend.setting.';
    public function index()
    {
        $setting = Setting::find(1);
        if ($setting == null ) {
            return redirect()->route('setting.create');
        }else{
            return view($this->foldername.'form', [
                'setting'=>$setting,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::find(1);

        if ($setting == null) {
            return view($this->foldername.'form');
        }else{
            return redirect()->route('setting.index');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $imagesupport = new ImageSupport();
        $icon = $imagesupport->saveAnyImg($request, 'setting', 'icon', 1080, 1080);
        $logo = $imagesupport->saveAnyImg($request, 'setting', 'logo', 1080, 720);

        $input['icon'] = $icon;
        $input['logo'] = $logo;

        $setting = new Setting();
        $setting->create($input);

        return redirect()->route('setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
        return view ('setting.form', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        $input = $request->all();

        $imagesupport = new ImageSupport();

        if (!$request->file('icon') == null) {
            $icon = $imagesupport->saveAnyImg($request, 'setting', 'icon', 1080, 1080);
            $input['icon'] = $icon;    
        }
       
        if (!$request->file('logo') == null){
            $logo = $imagesupport->saveAnyImg($request, 'setting', 'logo', 1080, 720);        
        $input['logo'] = $logo;
        }

        $setting->update($input);

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
