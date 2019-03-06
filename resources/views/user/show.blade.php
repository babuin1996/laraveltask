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
                        <label for="emailInput">Role: {{$role->name}}</label>
                    </div>

                    <div class="form-group">
                        <a href="/users" class="btn btn-primary float-right">Back</a>
                    </div>


            </div>
        </div>
    </div>
@endsection
