
@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="Add Role" parentPageUrl="{{route('roles.index')}}" currentPageTitle="Add New Role">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Create a New Role</h2>
    </div>
    <div class="card-body">

        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                    @error("name") <span class="text-danger">{{$message}}</span> @enderror
                </div>

               
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>

    </div>
</div>

@endsection



