@extends('layouts.app')


@section('content')
<div class="pagetitle">
    <h1>Update System</h1>
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


{!! Form::model($SystemSetting, ['method' => 'PATCH','route' => ['system-setting.update', $SystemSetting->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('company_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Company Number:</strong>
            {!! Form::text('company_number', null, array('placeholder' => 'number','class' => 'form-control')) !!}
          
        </div>
        <div class="form-group">
            <strong>Company Year:</strong>
            {!! Form::text('Year', null, array('placeholder' => 'yesr','class' => 'form-control')) !!}
          
        </div>
        <div class="form-group">
            <strong>Company Address:</strong>
            {!! Form::text('compnay_adress', null, array('placeholder' => 'address','class' => 'form-control')) !!}
           
        </div>
        <div class="form-group">
            <strong>Company Email:</strong>
            {!! Form::text('compnay_email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
       
        </div>
        <div class="form-group">
            <strong>Company Logo:</strong>
            {!! Form::file('logo', null, array('placeholder' => 'logo','class' => 'form-control')) !!}
       
        </div>
    </div>
  
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

        </div>
    </div>
</div>
</div>
    </section>
@endsection