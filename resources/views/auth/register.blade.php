@extends('layouts.app')

@section('title')
    @parent
    | Register
@endsection

@section('content')
    @include('blocks.breadcrumb', ['title' => 'Register'])

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0 mx-auto">
                    <form action="{{ route('post.register') }}" method="POST">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <p><span class="font-weight-bold">I am a new customer</span></p>

                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Full Name</label>
                                    <input class="mb-0 form-control" type="text" id="name" name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Enter your full name">

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control" type="email" id="email" name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Enter Your Email Address Here..">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" id="password"
                                           name="password"
                                           placeholder="Enter your password">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb--20">
                                    <label for="password">Confirm Password</label>
                                    <input class="mb-0 form-control" type="password" id="repeat-password"
                                           name="password_confirmation"
                                           placeholder="Confirm your password">

                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb--10">
                                    <button type="submit" class="btn btn-outlined w-100">Register</button>
                                </div>

                                <div class="col-md-12">
                                    <p class="text-center mt-2">Already have an account? <a href="{{ route('login') }}">Login</a>
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
