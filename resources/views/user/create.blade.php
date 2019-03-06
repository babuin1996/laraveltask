@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="h2">Users Manager</div>
                <form action="/users/store" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name">
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="text" class="form-control" id="emailInput" name="email">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control" id="passwordInput" name="password">
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Role: </label>
                    </div>
                        <div class="form-check form-check-inline">
                            @foreach($roles as $role)
                                <input type="radio" id="{{$role->slug}}" value="{{$role->id}}" name="role_id" class="form-check-input" @if($role->id == 1) checked @endif>
                                <label for="{{$role->slug}}" class="form-check-label">&nbsp;{{$role->name}}&nbsp;</label>
                            @endforeach
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Create user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
