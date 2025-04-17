{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="antialiased">
    @extends('layouts.app')
    @section('content')
    <div class="text-center mt-5">
        <h1>Open New Ticket</h1>
        <div class="m-5">
            <form clas="" action="{{route('tickets.store')}}" method="POST">
                {{ csrf_field() }}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! There were some problems with your input:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-16">

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="customer_name">Your Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="name" value="" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback text-left">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="email" value="" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback text-left">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="phone" value="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label foe="description">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback text-left">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-4 text-md-right">
                                <input type="submit"value="Submit"class="btn btn-success">
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
    @endsection
</body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="antialiased">
    @extends('layouts.app')
    @section('content')
    <div class="text-center mt-5">
        <h1>Open New Ticket</h1>
        <div class="m-5">
            <form action="{{route('tickets.store')}}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! There were some problems with your input:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-16">
                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="customer_name">Your Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                       class="form-control @error('customer_name') is-invalid @enderror">
                                @error('customer_name')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="description">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback text-left">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-4 text-md-right">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>


