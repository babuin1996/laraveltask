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
                                <label for="emailInput">Permissions: </label>
                            </div>
                            <div class="form-check form-check-inline">

                                <input type="checkbox" class="form-check-input" id="permCreate" value="1" name="permCreate">
                                <label class="form-check-label" for="permCreate">Can create</label>
                            </div>


                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="permRead" value="1" name="permRead">
                                <label class="form-check-label" for="permRead">Can read</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="permUpdate" value="1" name="permUpdate">
                                <label class="form-check-label" for="permUpdate">Can update</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="permDelete" value="1" name="permDelete">
                                <label class="form-check-label" for="permDelete">Can delete</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Create user</button>
                            </div>
                        </form>


            </div>
        </div>
    </div>
@endsection
