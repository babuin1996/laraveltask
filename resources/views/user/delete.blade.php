@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="h2">Do you want to delete this user?</div>

                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name" value="{{$user->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="text" class="form-control" id="emailInput" name="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Role: </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="permCreate" value="1" name="permCreate" @if($user->perm_create == 1) checked @endif disabled>
                        <label class="form-check-label" for="permCreate">Can create</label>
                    </div>

                    <form action="/users/destroy/{{$user->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            <a href="/users" class="btn btn-primary float-right">no</a>
                        </div>
                        <button class="btn btn-danger">yes</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
