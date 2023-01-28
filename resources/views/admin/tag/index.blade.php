@extends('layouts.app')

@include('_includes._datatable_css')
@section('custom_css')
@endsection

@section('content')

<x-breadcrumb currentPageTitle="All Tag"></x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @can('create-tag')
                <div class="text-sm-right">
                    <a href="{{route('tags.create')}}" type="button"
                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">
                        <i class="bx bx-user-plus mr-1"></i>
                        Add Tag
                    </a>
                </div>
                @endcan
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($tags as $tag)

                        <tr class="row1" data-id="{{ $tag->id }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tag->name}}</td>

                            <td>{{$tag->slug}}</td>
                            <td>
                                <input data-id="{{$tag->id}}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                    data-off="InActive" {{ $tag->status ? 'checked' : '' }}>

                            </td>

                            <td>
                                <div class="float-right d-flex">
                                    @can('edit-tag')
                                    <a href="{{route('tags.edit', $tag->id) }}"
                                        class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>
                                    @endcan

                                    @canany(['delete-tag','edit-tag'])
                                    <form action="{{route('tags.destroy', $tag->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcanany
                                </div>
                            </td>
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
            var tag_id = $(this).data('id');

            $.ajax({
                type: "GET"
                , dataType: "json"
                , url: '/tag/changestatus'
                , data: {
                    'status': status
                    , 'tag_id': tag_id
                }
                , success: function(data) {
                    alert('status changed succesfully');
                }
            });
        })
    })

</script>

@endsection