@extends('theme.base')

@section('content')
    <div class="container-fluid">
        <div class="container-sm">
            <h1 class="text-center mt-5">Formulario de registro</h1>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
@endsection
