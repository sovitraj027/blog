@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Site" parentPageUrl="{{route('sites.index')}}" currentPageTitle="Add New Site">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Create a new Site</h2>
    </div>
    <div class="card-body">
        <form action="{{route('sites.store')}}" method="POST" enctype="multipart/form-data" id="Myform">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                @error("name") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="url">url</label>
                <input type="text" class="form-control" name="url" id="url" value="{{old('url')}}">
                @error("url") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="form-group ">
                <label for="image">Image</label>
                <input type="file" class="form-control @error(" image") is-invalid @enderror" name="image" id="image" alt="image">
                  @error("image") <span class="text-danger">{{$message}}</span> @enderror
                <img id="showImagePreview" src="#" alt="book image preview" height="200px" width="250px">
               
            </div>
             @error("image")
             <div class="invalid-feedback">{{$message}}</div>
             @enderror

            
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
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

