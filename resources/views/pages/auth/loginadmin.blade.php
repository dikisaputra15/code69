@extends('layouts.auth')

@section('title', 'Login Admin')

@section('main')
<div class="col-xl-10 col-lg-12 col-md-9">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('img/loginlogo.jpg') }}" style="width:300px; height:300px; margin-left:100px;"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <form method="POST" class="user" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address..." name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password" name="password" required>
                        </div>
                       
                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                            Login
                        </a>
                       
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection