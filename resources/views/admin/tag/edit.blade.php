@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Tag" parentPageUrl="{{route('tags.index')}}" currentPageTitle="Edit Tag">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Update Tag</h2>
    </div>
    <div class="card-body">

        <form action="{{route('tags.update', $tag->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$tag->name}}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{$tag->slug}}">
            </div>


            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>

@endsection
@section('custom_js')
<script>
    $(document).ready(function() {
        $("#name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });
    });

</script>
@endsection

