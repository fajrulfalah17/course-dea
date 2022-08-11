@extends('layouts.isGuest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5" style="margin-top: 50px">
                <div class="card p-2 w-50 items-center">
                    <div class="col m-2">
                        <h3>Hei Lets Go!</h3>
                    </div>
                    
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-4" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="/login" class="nav-link active" id="tab-login" data-mdb-toggle="pill"
                                href="#pills-login" role="tab" aria-controls="pills-login"
                                aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="/register" class="nav-link" id="tab-register" data-mdb-toggle="pill"
                                href="#pills-register" role="tab" aria-controls="pills-register"
                                aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-register" role="tabpanel"
                            aria-labelledby="tab-register">
                            <form method="POST" action={{ route('register_action') }}>
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="username">
                                    <label class="form-label">Username</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control">
                                    <label class="form-label">Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a member? <a href="/register">Register</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pills content -->
@endsection
