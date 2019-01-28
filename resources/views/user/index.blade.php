@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Auth::user()->perm_create > 0 || Auth::user()->perm_read > 0 || Auth::user()->perm_update > 0 || Auth::user()->perm_delete > 0)
                    <div class="h2">Users Manager</div>



                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Can create</td>
                                <td>Can read</td>
                                <td>Can update</td>
                                <td>Can delete</td>
                                <td>Actions</td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>@if($user->perm_create == 0) No @else Yes @endif</td>
                                    <td>@if($user->perm_read == 0) No @else Yes @endif</td>
                                    <td>@if($user->perm_update == 0) No @else Yes @endif</td>
                                    <td>@if($user->perm_delete == 0) No @else Yes @endif</td>
                                    <td>
                                        @if(Auth::user()->perm_read > 0 || Auth::user()->perm_update > 0 || Auth::user()->perm_delete > 0)
                                            @if(Auth::user()->perm_read > 0)
                                                <a href="users/show/{{ $user->id }}" title="Watch">&#128065;</a>
                                            @endif
                                            @if(Auth::user()->perm_update > 0)
                                                <a href="users/update/{{ $user->id }}" title="Edit">&#9998;</a>
                                            @endif
                                            @if(Auth::user()->perm_delete > 0)
                                                <a href="users/delete/{{ $user->id }}" title="Delete">X</a>
                                            @endif
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                        @if(Auth::user()->perm_create > 0)
                            <a href="/users/create" type="button" class="btn btn-primary" title="Create">Create new user</a>
                        @endif
                    @else
                        <h4>You don't have enough permissions => <a class="btn btn-primary" href="/">Back</a></h4>
                    @endif
                </div>
            </div>
        </div>
    @endsection
