@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @guest

                    <h1>This page will be available after logging in</h1>
                    @if(auth()->user()->can('delete-user')) @endif
                    @else
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Actions</td>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                    @if(auth()->user()->can('read-user'))<a href="users/show/{{ $user->id }}" title="Watch">&#128065;</a>@endif
                                                    @if(auth()->user()->can('update-user') && auth()->user()->id != $user->id)<a href="users/update/{{ $user->id }}" title="Edit">&#9998;</a>@endif
                                                    @if(auth()->user()->can('delete-user') && auth()->user()->id != $user->id)<a href="users/delete/{{ $user->id }}" title="Delete">X</a>@endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                    @if(auth()->user()->can('create-user'))<a href="/users/create" type="button" class="btn btn-primary" title="Create">Create new user</a>@endif
                        @endguest
                    </div>
                </div>
            </div>
        @endsection
