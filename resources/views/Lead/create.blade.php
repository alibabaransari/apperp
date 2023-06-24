@extends('layouts.app')


@section('content')
<div class="pagetitle">
    <h1>Update Client</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol>
    </nav>
  </div>
    <section class="section">
<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('route' => 'lead.store','method'=>'POST','enctype'=>"multipart/form-data")) !!}
<div class="row">
    <div class="col-12">
    <h4>General Information</h4>
    </div>
    <div class="form-group col-md-12">
    <label class="required">Lead Type</label>
    <select class="form-control " name="lead_type" id="lead_type" required="">
    <option value="" disabled="" selected="">Please select</option>
    <option value="Standard Lead">Standard Lead</option>
    <option value="Termination">Termination</option>
    <option value="Bad Credit/CCJ">Bad Credit/CCJ</option>
    <option value="Poor Financials">Poor Financials</option>
    <option value="High Risk Sector">High Risk Sector</option>
    </select>
  
    </div>
    <div class="form-group col-md-12">
    <label class="required" for="required_services">Required Services</label>
    <div style="padding-bottom: 4px">
    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Select all</span>
    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">Deselect all</span>
    </div>
    <select class="form-control select2 select2-hidden-accessible" name="required_services[]" id="required_services" multiple="" required="" tabindex="-1" aria-hidden="true">
    <option value="1">EPOS</option>
    <option value="2">Merchant Services</option>
    <option value="3">Energy</option>
    <option value="4">Telecoms</option>
    <option value="5">Bottoms Up</option>
    <option value="6">Web/Marketing Services</option>
    <option value="7">Merchant Cash Advance</option>
    <option value="8">Open Banking</option>
    <option value="9">High Risk Bank Accounts</option>
    <option value="10"></option>
    </select>
    </div>
    <div class="col-12">
    <h4>Company Information</h4>
    </div>
    <div class="form-group col-sm-6">
    <label class="required" for="company_name">Company Name</label>
    <input class="form-control " type="text" name="company_name" id="company_name" value="" required="">

    </div>
    <div class="form-group col-sm-6">
    <label class="required" for="business_activity">Business Activity</label>
    <input class="form-control " type="text" name="business_activity" id="business_activity" value="" required="">
   
    </div>
    <div class="form-group col-md-4 d-none">
    <label class="required" for="date_interest_logged">Date Interest Logged</label>
    <input class="form-control date " type="text" name="date_interest_logged" id="date_interest_logged" value="2424/0606/23232323" required="">
   
    </div>
    <div class="form-group col-sm-6">
    <label class="required" for="first_name">First Name</label>
    <input class="form-control " type="text" name="first_name" id="first_name" value="" required="">
    
    </div>
    <div class="form-group col-sm-6">
    <label class="required" for="last_name">Last Name</label>
    <input class="form-control " type="text" name="last_name" id="last_name" value="" required="">
 
    </div>
    <div class="form-group col-md-4">
    <label class="required" for="phone_number">Phone Number</label>
    <input class="form-control " type="text" name="phone_number" id="phone_number" value="" required="">
   
    </div>
    <div class="form-group col-md-4">
    <label class="required" for="email_address">Email Address</label>
    <input class="form-control " type="email" name="email_address" id="email_address" value="" required="">

    </div>
    <div class="form-group col-md-4">
    <label for="website">Website</label>
    <input class="form-control " type="text" name="website" id="website" value="">
  
    </div>
    <div class="col-12">
    <h4>Lead Information</h4>
    </div>
    <div class="form-group col-md-6">
    <label class="required">Preferred Contact Method</label>
    <select class="form-control " name="preferred_contact_method" id="preferred_contact_method" required="">
    <option value="" disabled="" selected="">Please select</option>
    <option value="Email">Email</option>
    <option value="Phone">Phone</option>
    <option value="All" selected="">All</option>
    </select>
 
    </div>
    <div class="form-group col-md-6">
    <label for="lead_source_id">Lead Source</label>
    <select class="form-control  " name="lead_source_id" id="lead_source_id">
    <option value="" selected="">Please select</option>
    <option value="1">Facebook</option>
    <option value="2">Google</option>
    <option value="3">Phone Call</option>
    <option value="4">Word Of Mouth</option>
    <option value="5">Sales Agent Self Employed</option>
    <option value="6">Linkedin</option>
    <option value="7">Instagram</option>
    <option value="8">MVF</option>
    <option value="9">Referral Partner</option>
    <option value="10">Employee</option>
    <option value="11">Other</option>
    <option value="12">Website Enquiry</option>
    <option value="13">Merchant Panel</option>
    </select>
   
    </div>
    <div class="form-group col-12">
    <label for="additional_information">Additional Information</label>
    <textarea class="form-control " name="additional_information" id="additional_information"></textarea>
    </div>
    <div class="form-group d-none">
    <label for="lead_status_id">Lead Status</label>
    <select class="form-control select2 select2-hidden-accessible" name="lead_status_id" id="lead_status_id" tabindex="-1" aria-hidden="true">
    <option value="1" selected="">New Lead</option>
    </select>
    </div>
    <div class="form-group col-md-12">
    <label class="required">Lead Strength</label>
    <div class="form-check ">
    <input class="form-check-input" type="radio" id="lead_strength_Red Hot" name="lead_strength" value="Red Hot" required="">
    <label class="form-check-label" for="lead_strength_Red Hot">Red Hot</label>
    </div>
    <div class="form-check ">
    <input class="form-check-input" type="radio" id="lead_strength_Hot" name="lead_strength" value="Hot" required="">
    <label class="form-check-label" for="lead_strength_Hot">Hot</label>
    </div>
    <div class="form-check ">
    <input class="form-check-input" type="radio" id="lead_strength_Warm" name="lead_strength" value="Warm" required="">
    <label class="form-check-label" for="lead_strength_Warm">Warm</label>
    </div>
  
    </div>
    <div class="form-group col-md-12">
    <div class="form-check ">
    <input class="form-check-input" type="checkbox" name="gdpr" id="gdpr" value="1" required="">
    <label class="required form-check-label" for="gdpr">I have the customer permission to share this data</label>
    </div>
 
    </div>
    <div class="row fbottom">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </div>

{!! Form::close() !!}


        </div>
    </div>
</div>
</div>
    </section>

@endsection