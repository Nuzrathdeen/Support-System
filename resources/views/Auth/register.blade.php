@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1>Sign Up</h1>
    <div class="m-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="text-left">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('registeru') }}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback text-left">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-4 text-md-right">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback text-left">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-4 text-md-right">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback text-left">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-md-4 text-md-right">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : '' }}" required>
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback text-left">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8 offset-md-4 text-md-right">
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
