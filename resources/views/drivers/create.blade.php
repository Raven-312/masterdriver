@extends('admin.layouts.main')

@section('container')
    @include('partials.navbarAdmin')
    <section>
    <div class="container">
        <h1>Crear Nuevo Conductor</h1>
        <form action="{{ route('drivers.store') }}" method="POST" class="d-inline">

            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="mb-3">
            <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="car" id="checkRadio1"
                                value="Moto" >
                            <img src="{{ asset('assets/img/cars/Scooter.png')}}" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="car" id="checkRadio2"
                                value="Taxi"
                               >
                            <img src="{{ asset('assets/img/cars/Hatchback.png')}}" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="car" id="checkRadio3"
                                value="Camioneta">
                            <img src="{{ asset('assets/img/cars/Suv.png')}}" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="car" id="checkRadio4"
                                value="Sedan">
                            <img src="{{ asset('assets/img/cars/Sedan.png')}}" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="car" id="checkRadio5"
                                value="Trufi">
                            <img src="{{ asset('assets/img/cars/Van.png')}}" alt="Car 5">
                        </label>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Crear Conductor</button>
        </form>
    </div>
    </section>
@endsection


