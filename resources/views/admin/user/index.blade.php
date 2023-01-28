@extends('layouts.app')

@include('_includes._datatable_css')
@section('content')

<x-breadcrumb currentPageTitle="All Users"></x-breadcrumb>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
             
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%">S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody id="tablecontents">
                        @forelse ($users as $tag)

                        <tr class="row1" data-id="{{ $tag->id }}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tag->name}}</td>

                            <td>{{$tag->email}}</td>
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

