@extends('layouts.app')


@section('content')
<style>
    svg {
        display: none;
    }
    .shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    display: none;
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permissions List</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>


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
    @foreach ($permissions as $key => $permission)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $permission->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $permissions->render() !!}

        </div>
    </section>
</div>
@endsection