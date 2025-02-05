@extends('front.template')

@section('title')
    Registration
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div id="registration" class="custom-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="register">
                    <h3>Registration</h3>
                    <div class="reg-form">
                        <form method="POST" action="{{ route('register') }}" class="regisform">
                            @csrf
                            <div>
                                <label for="name">Name</label>
                                <input type="text" id="name" class="mt-2 p-3 form-control" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="mt-2 p-3 form-control" name="email" value="{{old('email')}}" required autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="mt-2 p-3 form-control" name="password" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            
                            <div class="mt-4">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="mt-2 p-3 form-control" name="password_confirmation" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-regis">Register</button>
                                </div>
                                <div class="col-6">
                                    <a class="al-regt" href="{{ route('login') }}">Already registered?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection