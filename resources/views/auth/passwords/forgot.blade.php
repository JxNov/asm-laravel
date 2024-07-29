@extends('layouts.app')

@section('title')
    @parent
    | Forgot Password
@endsection

@section('content')
    @include('blocks.breadcrumb', ['title' => 'Forgot Password'])

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            @if(session('message'))
                @include('blocks.toast', ['message' => session('message')])
            @endif

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
                    @if (session('token'))
                        <div class="alert alert-success" role="alert">
                            {{ session('token') }}
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Forgot Password</h4>
                            <p><span class="font-weight-bold">I forgot my password</span></p>

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

                                <div class="col-12">
                                    <p class="text-muted text-center">
                                        We will send you an email to reset your password.
                                    </p>
                                </div>

                                <div class="col-md-12 mb--10">
                                    <button type="submit" class="btn btn-outlined w-100">
                                        Send Password Reset Link
                                    </button>
                                </div>

                                <div class="col-md-12 mb--10">
                                    <a href="{{ route('login') }}" class="btn btn-outlined w-100">
                                        Back to Login
                                    </a>
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
