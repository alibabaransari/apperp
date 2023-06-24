<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id','DESC')->paginate(5);
        return view('client.index',compact('clients'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Client = Client::get();
        return view('client.create',compact('Client'));
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
       
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            $imagePath = 'images/' . $imageName;
        }
    
        $Client = new Client;
        $Client->company_name =  $request->company_name;
        $Client->tranding_name =  $request->tranding_name;
        $Client->fisrt_name =  $request->first_name;
        $Client->last_name =  $request->last_name;
        // $Client->addresss =  $request->address;
        $Client->email =  $request->email;
        $Client->phone =  $request->phone;
        $Client->image = $imageName;
        $Client->save(); 
     
        return redirect()->route('client.edit',$Client->id)
                        ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Client = Client::find($id);
       
    
        return view('client.show',compact('Client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Client = Client::find($id);
        return view('client.edit',compact('Client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            
        ]);
        $Client = Client::find($id);
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
    
            $imagePath = 'images/' . $imageName;
            $Client->image = $imageName;
        }
    
       
        $Client->company_name =  $request->company_name;
        $Client->tranding_name =  $request->tranding_name;
        $Client->fisrt_name =  $request->first_name;
        $Client->last_name =  $request->last_name;
        // $Client->addresss =  $request->address;
        $Client->email =  $request->email;
        $Client->phone =  $request->phone;
        $Client->save(); 

        return redirect()->route('client.edit',$Client->id)
        ->with('success','Role created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        DB::table("clients")->where('id',$id)->delete();
        return redirect()->route('client.index')
                        ->with('success','Role deleted successfully');
    }
}
