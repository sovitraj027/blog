@extends('layouts.app')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row rowcenter">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-head">
                        <h3 class="card-header">{{ $role->name }}</h3>
                        <span class="float-right" style="margin-right:20px;">
                            Mark All: <input type="checkbox" class="check_all" />
                        </span>
                    </div>
                    <form action="{{ route('roles.update',[$role->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Modules</td>
                                        <td>view</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                     <tr>
                                        <td>Post</td>
                                        <td>
                                            <input type="checkbox" name="view-post" class="permission_check " @if($role->hasPermissionTo('view-post')) checked @endif />

                                        </td>
                                        <td>
                                            <input type="checkbox" name="edit-post" class="permission_check " @if($role->hasPermissionTo('edit-post')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete-post" class="permission_check " @if($role->hasPermissionTo('delete-post')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="create-post" class="permission_check " @if($role->hasPermissionTo('create-post')) checked @endif />
                                        </td>
                                    </tr>
                                

                                        <td>Tag</td>
                                        <td>
                                            <input type="checkbox" name="view-tag" class="permission_check " @if($role->hasPermissionTo('view-tag')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="edit-tag" class="permission_check " @if($role->hasPermissionTo('edit-tag')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete-tag" class="permission_check " @if($role->hasPermissionTo('delete-tag')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="create-tag" class="permission_check " @if($role->hasPermissionTo('create-tag')) checked @endif />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>
                                            <input type="checkbox" name="view-category" class="permission_check " @if($role->hasPermissionTo('view-category')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="edit-category" class="permission_check " @if($role->hasPermissionTo('edit-category')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete-category" class="permission_check " @if($role->hasPermissionTo('delete-category')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="create-category" class="permission_check " @if($role->hasPermissionTo('create-category')) checked @endif />
                                        </td>
                                    </tr>
               
                                   
                                    <tr>
                                    <td>Role</td>

                                    <td>
                                        <input type="checkbox" name="view-role" class="permission_check " @if($role->hasPermissionTo('view-role')) checked @endif />
                                    </td>
                                    <td>
                                        <input type="checkbox" name="edit-role" class="permission_check " @if($role->hasPermissionTo('edit-role')) checked @endif />
                                    </td>
                                    <td>
                                        <input type="checkbox" name="delete-role" class="permission_check " @if($role->hasPermissionTo('delete-role')) checked @endif />
                                    </td>
                                    <td>
                                        <input type="checkbox" name="create-role" class="permission_check " @if($role->hasPermissionTo('create-role')) checked @endif />
                                    </td>
                                    </tr>

                                    <tr>
                                        <td>Site</td>

                                        <td>
                                            <input type="checkbox" name="view-site" class="permission_check " @if($role->hasPermissionTo('view-site')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="edit-site" class="permission_check " @if($role->hasPermissionTo('edit-site')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="delete-site" class="permission_check " @if($role->hasPermissionTo('delete-site')) checked @endif />
                                        </td>
                                        <td>
                                            <input type="checkbox" name="create-site" class="permission_check " @if($role->hasPermissionTo('create-site')) checked @endif />
                                        </td>
                                    </tr>

                                      <tr>
                                          <td>User</td>
                                          <td>
                                              <input type="checkbox" name="view-user" class="permission_check " @if($role->hasPermissionTo('view-user')) checked @endif />
                                          </td>
                                          <td>
                                              <input type="checkbox" name="edit-user" class="permission_check " @if($role->hasPermissionTo('edit-user')) checked @endif />
                                          </td>
                                          {{-- <td>
                                              <input type="checkbox" name="delete-user" class="permission_check " @if($role->hasPermissionTo('delete-user')) checked @endif />
                                          </td> --}}
                                          {{-- <td>
                                              <input type="checkbox" name="create-user" class="permission_check " @if($role->hasPermissionTo('create-user')) checked @endif />
                                          </td> --}}
                                      </tr>


                                  
                                </tbody>
                            </table>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).on('click', '.check_all', function() {
        if ($(this).is(':checked')) {
            $('.permission_check').prop('checked', true);
        } else {
            $('.permission_check').prop('checked', false);
        }
    });

</script>

@endsection
