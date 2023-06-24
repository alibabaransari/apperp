@extends('layouts.app')


@section('content')
<div class="pagetitle">
    <h1>Lead List</h1>
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
            @can('role-create')
            <a class="btn btn-success" href="{{ route('lead.create') }}"> Add Lead</a>
        @endcan
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($Leads as $key => $Lead)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $Lead->first_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('client.show',$Lead->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('client.edit',$Lead->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['client.destroy', $Lead->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $Leads->render() !!}

        </div>
    </div>
</div>
</div>
    </section>

@endsection