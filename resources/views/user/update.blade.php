@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="h2">Users Manager</div>
                <form action="/users/update/{{$user->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="text" class="form-control" id="emailInput" name="email" value="{{$user->email}}">
                    </div>
                    @if(auth()->user()->isAdmin())
                        <div class="form-group">
                            <label for="emailInput">Roles: </label>
                        </div>
                        <div class="form-check form-check-inline">
                            @foreach($roles as $role)
                                <input type="radio" id="{{$role->slug}}" @if($role->id === $currentRole->id) checked @endif value="{{$role->id}}" name="role_id" class="form-check-input">
                                <label for="{{$role->slug}}" class="form-check-label">&nbsp;{{$role->name}}&nbsp;</label>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Update user</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
