@extends('layouts.auth')

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                <div class="card card-primary">
                    <div class="card-header justify-content-center">
                        <h4>Registrasi</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('save-register')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" 
                                    required autofocus>
                                @if ($errors->has('email'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input id="fullname" type="text" class="form-control" name="fullname"
                                    required autofocus>
                                @if ($errors->has('fullname'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <input id="phone_number" type="text" class="form-control" name="phone_number" 
                                    required autofocus>
                                @if ($errors->has('phone_number'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password"
                                    tabindex="2" required>
                                @if ($errors->has('password'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" >
                                    Sign-Up
                                </button>
                            </div>
                            {{-- <div class="my-3 text-muted text-center">
                                Don't have an account?
                            </div> --}}
                            {{-- <div class="form-group">
                                <a href="{{route('sign-up')}}"  class="btn btn-primary btn-lg btn-block text-white" >
                                    Create Account One
                                </a>
                            </div> --}}
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    already have an account? <a href="{{ route('sign-in') }}">Let's go sign-in</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection