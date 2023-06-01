@extends('layouts.auth')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    @include('partials.auth.flash_message')
                    <div class="card card-primary">
                        <div class="card-header justify-content-center">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('check-login')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        required autofocus>
                                    @if ($errors->has('email'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('email') }}</span>
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
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
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
                        Don't have an account? <a href="{{ route('sign-up') }}">Create One</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
