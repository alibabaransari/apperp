@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>System Setting</h2>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('system-setting.index') }}"> Back</a>
        </div> --}}
    </div>
</div>


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


{!! Form::open(array('route' => 'system-setting.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company Name:</strong>
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
    <div class="col-xs-12 col-sm-12 col-md-12">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


        </div></section>
</div>
@endsection