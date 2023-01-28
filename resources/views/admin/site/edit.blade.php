@extends('layouts.app')

@section('content')

<x-breadcrumb parentPageTitle="All Site" parentPageUrl="{{route('sites.index')}}" currentPageTitle="Edit Site">
</x-breadcrumb>

<div class="card">
    <div class="card-header">
        <h2 class="lead text-center">Edit Site</h2>
    </div>
    <div class="card-body">
        <form action="{{route('sites.update',$site->id)}}" method="POST" enctype="multipart/form-data" id="Myform">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$site->name}}">
                @error("name") <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" name="url" id="url" value="{{$site->url}}}">
                @error("url") <span class="text-danger">{{$message}}</span> @enderror

            </div>
        
            <div class="form-group ">
                <label for="image">Image</label>
                <input type="file" class="form-control @error(" image") is-invalid @enderror" name="image" id="image" alt="image">
                @if(!is_null($site->image))
                <img id="showImagePreview" src="{{ asset('storage/site-image/'.$site->image)}}" alt="site image preview" height="150px" width="250px">
                @else
                <img id="showImagePreview" src="#" alt="site image preview" height="150px" width="250px" style="display: none;">
                @endif

                @error("image")
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
           
            <button class="btn btn-primary" type="submit">Update</button>
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
        // showImagePreview.style.display = "none";
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

