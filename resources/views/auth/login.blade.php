@extends('layouts.app')

@section('title')
    @parent
    | Login
@endsection

@section('content')
    @include('blocks.breadcrumb', ['title' => 'Login'])

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            @if(session('message'))
                @include('blocks.toast', ['message' => session('message')])
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
                    <form action="{{ route('post.login') }}" method="POST">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <p><span class="font-weight-bold">I am a returning customer</span></p>

                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Enter your email address here</label>
                                    <input class="mb-0 form-control" type="email" id="email" name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Enter you email address here...">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb--20">
                                    <label for="login-password">Password</label>
                                    <input class="mb-0 form-control" type="password" id="login-password"
                                           name="password"
                                           placeholder="Enter your password">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb--15">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="login-remember"
                                                   style="cursor: pointer; height: 14px; padding: 0"
                                                   name="remember">
                                            <label class="form-check-label" for="login-remember"
                                                   style="cursor: pointer; margin: 0">
                                                Remember me
                                            </label>
                                        </div>

                                        <a href="{{ route('password.request') }}" class="ml-auto">
                                            Forgot your password?
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-12 mb--10">
                                    <button type="submit" class="btn btn-outlined w-100">Login</button>
                                </div>

                                <div class="col-md-12">
                                    <p class="text-center mt-2">
                                        Don't have an account?
                                        <a href="{{ route('register') }}">Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

@endpush
