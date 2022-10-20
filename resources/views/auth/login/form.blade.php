@extends('theme.base')

@section('content')
    <div class="container-fluid">
        <div class="container-sm">
            <h1 class="text-center mt-5">Inicio de sesión</h1>
            @if (Session::has('userRegistered'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('userRegistered') }}
                </div>
            @endif
            @if (Session::has('wrongCredentials'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('wrongCredentials') }}
                </div>
            @endif
            <form action="{{ route('login.login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
