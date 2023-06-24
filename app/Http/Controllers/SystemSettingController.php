<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $SystemSetting = SystemSetting::orderBy('id','DESC')->paginate(5);
        return view('systemsetting.index',compact('SystemSetting'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = SystemSetting::get();
        return view('systemsetting.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'logo'=>'required',
        ]);
        // if(hasfile($request->logo))
        // {

        // }
    
        $SystemSetting = new SystemSetting;
        $SystemSetting->company_name =  $request->company_name;
        $SystemSetting->company_number =  $request->company_number;
        $SystemSetting->Year =  $request->Year;
        $SystemSetting->compnay_adress =  $request->compnay_adress;
        $SystemSetting->compnay_email =  $request->compnay_email;
        $SystemSetting->logo = $request->logo;
        $SystemSetting->save(); 
     
        return redirect()->route('system-setting.edit',$SystemSetting->id)
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SystemSetting = SystemSetting::find($id);
       
    
        return view('systemsetting.show',compact('SystemSetting'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SystemSetting = SystemSetting::find($id);
        return view('systemsetting.edit',compact('SystemSetting'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'logo'=>'required',
        ]);
    
        $SystemSetting = SystemSetting::find($id);
        $SystemSetting->company_name =  $request->company_name;
        $SystemSetting->company_number =  $request->company_number;
        $SystemSetting->Year =  $request->Year;
        $SystemSetting->compnay_adress =  $request->compnay_adress;
        $SystemSetting->compnay_email =  $request->compnay_email;
        $SystemSetting->logo = $request->logo;
        $SystemSetting->save(); 
        return redirect()->route('system-setting.edit',$SystemSetting->id)
        ->with('success','Role created successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('system-setting.index')
                        ->with('success','Role deleted successfully');
    }
}
