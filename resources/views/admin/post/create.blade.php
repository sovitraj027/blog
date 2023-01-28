@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Post" parentPageUrl="{{route('posts.index')}}" currentPageTitle="Add New Post">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Create a new Post</h2>
    </div>
    <div class="card-body">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error("title") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}">
                @error("title") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control select_2" name="category_id" id="category_id">
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $key=>$category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                    @error("category_id") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Tag</label>
                <select class="form-control select_2" name="tag_id[]" id="tag_id" multiple>
                    @foreach ($tags as $key=>$tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                    @error("tag_id") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group ">
                <label for="image">Image</label>
                <input type="file" class="form-control @error(" image") is-invalid @enderror" name="image" id="image" alt="image">
                <img id="showImagePreview" src="#" alt="book image preview" height="200px" width="250px">
                @error("image")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" cols="5">{{old('description')}}</textarea>
                @error("description") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
    $('.select_2').select2();

    $(document).ready(function() {
        $("#title").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });
    });

        window.onload = function() {

        // to display image preview
        let siteImage = document.getElementById('image');
        let showImagePreview = document.getElementById('showImagePreview');
        showImagePreview.style.display = "none";

        siteImage.onchange = evt => {
        const [file] = siteImage.files
        if (file) {
        showImagePreview.style.display = "block";
        showImagePreview.src = URL.createObjectURL(file);
        showImagePreview.onload = function() {
        URL.revokeObjectURL(showImagePreview.src) // free memory
        }
        }
        }
        };


</script>
@endsection


