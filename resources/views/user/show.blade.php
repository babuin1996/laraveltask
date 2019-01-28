@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="h2">Users Manager</div>

                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" name="name" value="{{$user->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="text" class="form-control" id="emailInput" name="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">Permissions: </label>
                    </div>
                    <div class="form-check form-check-inline">

                        <input type="checkbox" class="form-check-input" id="permCreate" value="1" name="permCreate" @if($user->perm_create == 1) checked @endif disabled>
                        <label class="form-check-label" for="permCreate">Can create</label>
                    </div>


                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="permRead" value="1" name="permRead" @if($user->perm_read == 1) checked @endif disabled>
                        <label class="form-check-label" for="permRead">Can read</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="permUpdate" value="1" name="permUpdate" @if($user->perm_update == 1) checked @endif disabled>
                        <label class="form-check-label" for="permUpdate">Can update</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="permDelete" value="1" name="permDelete" @if($user->perm_delete == 1) checked @endif disabled>
                        <label class="form-check-label" for="permDelete">Can delete</label>
                    </div>

                    <div class="form-group">
                        <a href="/users" class="btn btn-primary float-right">Back</a>
                    </div>


            </div>
        </div>
    </div>
@endsection
