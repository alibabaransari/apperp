<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Leads = Lead::orderBy('id','DESC')->paginate(5);
        return view('Lead.index',compact('Leads'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Lead.create');
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
            // 'company_name' => 'required',
           
        ]);
        $service_dat= '';
    
        $lead = new Lead;
        foreach($request->required_services as $service){
            $service_dat .=$service.',';
        }
        $lead->type =  $service_dat;
        $lead->service =  $request->company_number;
        $lead->company =  $request->company_name;
        $lead->information =  $request->date_interest_logged;
        $lead->activity =  $request->business_activity;
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->phone = $request->phone_number;
        $lead->email = $request->email_address;
        $lead->website = $request->website;
        $lead->prefered_contact = $request->preferred_contact_method;
        $lead->sources = $request->lead_source_id;
        $lead->addtion = $request->additional_information;
        $lead->strength = $request->lead_strength;
        $lead->method = $request->lead_status_id;
        $lead->perimision = $request->gdpr;
        $lead->save(); 
     
        return redirect()->route('lead.index')
                        ->with('success','Lead created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Lead = Lead::find($id);
        return view('lead.show',compact('Lead'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Lead = Lead::find($id);
        return view('lead.edit',compact('Lead'));
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
    
        $lead = Lead::find($id);
        $service_dat= '';
        foreach($request->required_services as $service){
            $service_dat .=$service.',';
        }
        $lead->type =  $service_dat;
        $lead->service =  $request->company_number;
        $lead->company =  $request->company_name;
        $lead->information =  $request->date_interest_logged;
        $lead->activity =  $request->business_activity;
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->phone = $request->phone_number;
        $lead->email = $request->email_address;
        $lead->website = $request->website;
        $lead->prefered_contact = $request->preferred_contact_method;
        $lead->sources = $request->lead_source_id;
        $lead->addtion = $request->additional_information;
        $lead->strength = $request->lead_strength;
        $lead->method = $request->lead_status_id;
        $lead->perimision = $request->gdpr;
        $lead->save(); 
     
        return redirect()->route('lead.edit',$lead->id)
        ->with('success','Lead created successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("Leads")->where('id',$id)->delete();
        return redirect()->route('system-setting.index')
                        ->with('success','Lead deleted successfully');
    }
}
