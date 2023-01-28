@extends('layouts.app')

@include('_includes._datatable_css')

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       @can('create-role')
                        <div class="mb-3">
                            <a href="{{route('roles.create')}}" class="btn btn-primary">Add Role</a>
                        </div>
                        @endcan
                        <div class="table-responsive">
                            <table id="service" class="table  table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($roles)>0)
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{isset($role->id)?$role->id:""}}</td>
                                        <td>{{$role->name}}</td>
                                        @canany(['edit-role','delete-role'])
                                        <td>
                                            <div class="row">
                                                <a href="{{route('roles.edit',$role->id) }}" class="btn btn-primary">{{__('Change Permission')}}</a>
                                                <form action="{{route('roles.destroy', $role->id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" type="submit" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                            </div>

                                        </td>
                                        @endcanany
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



