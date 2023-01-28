@extends('layouts.app')

@include('_includes._datatable_css')
@section('custom_css')
@endsection

@section('content')

<x-breadcrumb currentPageTitle="All Post"></x-breadcrumb>

<form action="{{route('filterPost')}}" method="GET">
    <div class="row" style="margin-bottom:0%;">
        <div class="col-sm-4">
            <div id="gradeContent">
                <select  class="form-control" name="category_id">
                    <option value="">Select Category</option>
                   @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </div>

</form>

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <div class="text-sm-right">
                    @can('create-post')
                    <a href="{{route('posts.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                        <i class="bx bx-user-plus mr-1"></i>
                        Add Post
                    </a>
                    @endcan

                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($posts as $post)

                        <tr class="row1" data-id="{{ $post->id }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td><img src="/storage/post-image/{{ $post->image }}" width="100" height="50"></td>
                            <td>{!! Str::limit($post->description, 50, ' ...') !!}</td>
                            <td>
                                <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->status ? 'checked' : '' }}>

                            </td>
                            @canany(['edit-post','delete-post'])
                            <td>
                                <div class="float-right d-flex">
                                    <a href="{{route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>

                                    <form action="{{route('posts.destroy', $post->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                            @endcanany
                        </tr>
                        @empty
                        <td>No record</td>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection

@include('_includes._datatable_js')
@section('scripts')
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var post_id = $(this).data('id');

            $.ajax({
                type: "GET"
                , dataType: "json"
                , url: '/post/changestatus'

                , data: {
                    'status': status
                    , 'post_id': post_id
                }
                , success: function(data) {
                    alert('status changed succesfully');
                }
            });
        })
    })



</script>

@endsection

