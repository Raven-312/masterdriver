@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="margin-top: 60px;">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div>
            <!-- End: Image -->
            <form action="register" method="POST">
                @csrf

                <h2 class="text-center" style="margin-top: -18px;"><strong>Crea</strong> una cuenta.</h2>
            <p class="text-center" style="margin-top: 1px;">Únete a nosotros<br></p>

            @if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hubo algunos problemas con la información ingresada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <div class="mb-3">
                    <input type="email" name="email" placeholder="Correo"
                        class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Nombre"
                        class="form-control @error('username') is-invalid @enderror" required
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Contraseña"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" placeholder="Repite la Contraseña"
                        class="form-control @error('confirm_password') is-invalid @enderror" required>
                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <p><strong>Selecciona tu Vehículo</strong><br></p>

                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="car[]" id="checkRadio1"
                                value="Scooter" {{ in_array('Scooter', old('car', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="car[]" id="checkRadio2"
                                value="Hatch Back"
                                {{ in_array('Hatch Back', old('car', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="car[]" id="checkRadio3"
                                value="Suv" {{ in_array('Suv', old('car', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="car[]" id="checkRadio4"
                                value="Sedan" {{ in_array('Sedan', old('car', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Sedan.png" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="checkbox" name="car[]" id="checkRadio5"
                                value="Van" {{ in_array('Van', old('car', [])) ? 'checked' : '' }}>
                            <img src="assets/img/cars/Van.png" alt="Car 5">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                <label class="form-check-label">
              <input class="form-check-input" type="checkbox" required>Estoy de acuerdo con los términos de la licencia.</label>

                </div>
                <div class="mb-3">
                    <input class="btn btn-primary d-block w-100" type="submit" name="signUp-button"
                        style="background: rgb(254,209,54);" value="Registrarse">
                </div>
                <a class="already" href="/login">¿Ya tienes una cuenta? Inicia sesión aquí.</a>

            </form>
        </div>

        <!-- End: Form Container -->
    </section>
    <!-- End: Registration Form with Photo -->
@endsection
