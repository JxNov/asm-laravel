@extends('layouts.app')

@section('title')
    @parent
    | Reset Password
@endsection

@section('content')
    @include('blocks.breadcrumb', ['title' => 'Reset Password'])

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Reset Password</h4>
                            <p><span class="font-weight-bold">I forgot my password</span></p>

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="row">
                                <div class="col-12 mb--20">
                                    <label for="reset-password">
                                        Enter your new password
                                    </label>
                                    <input class="mb-0 form-control" type="password" id="reset-password"
                                           name="password"
                                           placeholder="Enter your new password">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb--20">
                                    <label for="reset-password-confirm">
                                        Confirm your new password
                                    </label>
                                    <input class="mb-0 form-control" type="password" id="reset-password-confirm"
                                           name="password_confirmation"
                                           placeholder="Confirm your password">

                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb--10">
                                    <button type="submit" class="btn btn-outlined w-100">
                                        Reset Password
                                    </button>
                                </div>

                                <div class="col-md-12">
                                    <p class="text-center mt-2">
                                        <a href="{{ route('login') }}">Back to Login</a>
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
