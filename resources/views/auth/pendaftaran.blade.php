@extends('auth.layout')

@section('title', 'Pendaftaran - Kelompok 3')

@section('content')

<div class="container">

    @if ($error = Session::get('error'))

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
            title: "{{ $error }}"
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
                                style="height:800px; width:500px;">

                            @else
                            <img src="{{asset('img/kelompok-3.jpg')}}" class="img-fluid"
                                style="height:600px; width:500px;">
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                                </div>

                                <form method="post" action="{{url('proses_pendaftaran')}}">
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
                                        <div class="input-with-icon">
                                            <input type="password" id="password" class="form-control password"
                                                name="password" value="{{old('password')}}" autocomplete="off">
                                            <i class="initIcon"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('password'))
                                    <p style="font-size: 15px; color:red;"><i
                                            class="bi bi-exclamation-octagon-fill"></i>
                                        {{ucfirst($errors->first('password'))}}
                                    </p>
                                    @endif

                                    <div class="iconPassword mb-4">
                                        <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                        <div class="input-with-icon">
                                            <input type="password" id="konfirmasi_password"
                                                class="form-control password" name="konfirmasi_password"
                                                value="{{old('konfirmasi_password')}}" autocomplete="off">
                                            <i class="initIcon"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('konfirmasi_password'))
                                    <p style="font-size: 15px; color:red;"><i
                                            class="bi bi-exclamation-octagon-fill"></i>
                                        {{ucfirst($errors->first('konfirmasi_password'))}}
                                    </p>
                                    @endif

                                    <div class="text-center">
                                        <button class="btn btn-dark w-75 rounded-pill submit" type="submit"
                                            name="daftar">Daftar</button>

                                        <button class="btn btn-dark w-75 rounded-pill btn-loading d-none" type="button"
                                            disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <a href="{{url('login')}}"
                                            style="color:black; text-decoration: underline;">Kembali</a>
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





{{-- @extends('auth.layout')

@section('title', 'Pendaftaran - Kelompok 3')

@section('content')

<!-- Section -->
<section class="vh-100">

    <!-- Container -->
    <div class="container h-100">

        <!-- Row -->
        <div class="row d-flex justify-content-center align-items-center h-100">

            <!-- Col -->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mt-4">

                <!-- Card -->
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border: 2px solid white;">

                    <!-- Card body -->
                    <div class="card-body p-5">

                        <!-- pendaftaran -->
                        <h3 class="mb-5 text-center">Pendaftaran</h3>
                        <!-- </Akhir pendaftaran -->

                        @if ($errorMessage = Session::get('error'))
                        <div class="alert alert-danger text-center">
                            <p>{{$errorMessage}}</p>
                        </div>
                        @endif

                        <!-- Form -->
                        <form method="post" action="{{url('proses_pendaftaran')}}">

                            @csrf

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="form-label" for="email">Email</label>

                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{old('email')}}" autocomplete="off">

                            </div>
                            <!-- </Akhir email -->

                            @if ($errors->has('email'))
                            <p style="font-size: 15px; color:red;"><i class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('email'))}}
                            </p>
                            @endif

                            <!-- Password -->
                            <div class="iconPassword mb-4">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="password" class="form-control password" name="password"
                                        value="{{old('password')}}" autocomplete="off">
                                    <i class="initIcon"></i>
                                </div>
                            </div>
                            <!-- </Akhir password -->

                            @if ($errors->has('password'))
                            <p style="font-size: 15px; color:red;"><i class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password'))}}
                            </p>
                            @endif

                            <!-- Konfirmasi password -->
                            <div class="iconPassword mb-4">
                                <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="konfirmasi_password" class="form-control password"
                                        name="konfirmasi_password" value="{{old('konfirmasi_password')}}"
                                        autocomplete="off">
                                    <i class="initIcon"></i>
                                </div>
                            </div>
                            <!-- </Akhir konfirmasi password -->

                            @if ($errors->has('konfirmasi_password'))
                            <p style="font-size: 15px; color:red;"><i class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('konfirmasi_password'))}}
                            </p>
                            @endif

                            <!-- Tombol daftar -->
                            <div class="text-center">
                                <button class="btn btn-dark w-75 rounded-pill submit" type="submit"
                                    name="daftar">Daftar</button>

                                <button class="btn btn-dark w-75 rounded-pill btn-loading d-none" type="button"
                                    disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                            <!-- </Akhir tombol daftar -->

                            <hr>

                            <div class="text-center">
                                <a href="{{url('login')}}" style="color:black; text-decoration: underline;">Kembali</a>
                            </div>

                        </form>
                        <!-- </Akhir form -->

                    </div>
                    <!-- </Akhir card body -->

                </div>
                <!-- </Akhir card -->

            </div>
            <!-- </Akhir col -->

        </div>
        <!-- </Akhir row -->

    </div>
    <!-- </Akhir container -->

</section>
<!-- </Akhir section -->


@endsection --}}