@extends('layouts.app')


@section('content')
<div class="pagetitle">
    <h1>Form Elements</h1>
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
            <h5 class="card-title">Client Management</h5>
            
             
                    @can('role-create')
                        <a class="btn btn-success" href="{{ route('client.create') }}"> Add Client</a>
                    @endcan
            
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($clients as $key => $client)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $client->company_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('client.show',$client->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('client.edit',$client->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['client.destroy', $client->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $clients->render() !!}

        </div>
    </div>
</div>
</div>
       
    </section>

@endsection