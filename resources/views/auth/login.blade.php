@extends('auth.layout')

@section('title', 'Login - Kelompok 3')

@section('content')

<div class="container">

    @if ($logout = Session::get('logout'))

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ $logout }}"
        });
    </script>

    @elseif ($successMessage = Session::get('success'))

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ $successMessage }}"
        });
    </script>

    @elseif ($errorMessage = Session::get('error'))

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "{{ $errorMessage }}"
        });
    </script>

    @endif

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="border: 2px solid white;">

                <div class="card-body p-0">

                    <div class="row">

                        <div class="col-lg-6 d-none d-lg-block">

                            @if ($errors->has('email') || $errors->has('password'))
                            <img src="{{asset('img/kelompok-3.jpg')}}" class="img-fluid"
                                style="height:600px; width:500px;">

                            @else
                            <img src="{{asset('img/kelompok-3.jpg')}}" class="img-fluid"
                                style="height:500px; width:500px;">
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>

                                <form method="post" action="{{url('proses_login')}}">
                                    @csrf

                                    <div class="mb-4">
                                        <label class="form-label" for="email">Email</label>

                                        <input type="email" id="email" class="form-control" name="email"
                                            value="{{old('email')}}" autocomplete="off">

                                    </div>

                                    @if ($errors->has('email'))
                                    <p style="font-size: 15px; color:red;"><i
                                            class="bi bi-exclamation-octagon-fill"></i>
                                        {{ucfirst($errors->first('email'))}}
                                    </p>
                                    @endif

                                    <div class="iconPassword mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            value="{{old('password')}}" autocomplete="off">
                                        <div class="initIcon"></div>
                                    </div>

                                    @if ($errors->has('password'))
                                    <p style="font-size: 15px; color:red;"><i
                                            class="bi bi-exclamation-octagon-fill"></i>
                                        {{ucfirst($errors->first('password'))}}
                                    </p>
                                    @endif

                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="form1Example3" @if(old('remember')) checked @endif>
                                        <label class="form-check-label ms-2" for="form1Example3"> Ingat saya </label>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-dark w-75 rounded-pill submit" type="submit"
                                            name="login">Login</button>

                                        <button class="btn btn-dark w-75 rounded-pill btn-loading d-none" type="button"
                                            disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <a href="{{url('pendaftaran')}}"
                                            style="color:black; text-decoration: underline;">Pendaftaran</a>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection