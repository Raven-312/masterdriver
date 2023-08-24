@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="/booking" method="POST" style="margin-top: 70px;max-width: 1000px;">
                        @csrf

                        <h2 class="text-center">Reserva una carrera</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <stron></strong> Hubo algunos problemas con tu registro<br><br>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Gracias por tu reserva!',
                                    html: '{!! session('success') !!}',
                                    footer: '<a href="">Reserva otra vez</a>'
                                })
                            </script>
                        @endif

                        @if (session()->has('sbname'))
                            <script>
                                Swal.fire({
                                    icon: 'question',
                                    title: '¿Vas a algún lugar?',
                                    text: 'Solo necesitamos un poco más de información para nuestros pasajeros de taxi',
                                    showDenyButton: true,
                                    confirmButtonText: 'OK',
                                    denyButtonText: 'Cancelar',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire('Vamos a llenar añgunos datos', '', 'info')
                                    } else if (result.isDenied) {
                                        location.href = "/cancel-booking";
                                    }
                                })
                            </script>
                        @endif

                        @if (session()->has('cancelSuccess'))
                            <script>
                                Swal.fire(
                                    'Cancelado',
                                    '{{ session('cancelSuccess') }}',
                                    'success'
                                )
                            </script>
                        @endif

                        <div class="mb-3">
                            <p><strong>Nombre</strong></p>
                            <input type="text" id="fName" name="fName" placeholder="👤"
                                class="form-control @error('fName') is-invalid @enderror" required autofocus
                                value="{{ old('fName') }}">

                            @error('fName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Apellido</strong></p>
                            <input type="text" id="lName" name="lName" placeholder="👤"
                                class="form-control @error('lName') is-invalid @enderror" required
                                value="{{ old('lName') }}">

                            @error('lName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>Telefono</strong></p>

                            @if (session()->exists('phone'))
                                @if (!empty(session()->get('phone')))
                                    <input type="text" id="phone" name="phoneNumber" placeholder="☎️ Formato 7777777"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" required
                                        value="{{ session()->get('phone') }}">
                                @else
                                    <input type="text" id="phone" name="phoneNumber" placeholder="☎️"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" required
                                        value="{{ old('phoneNumber') }}">
                                @endif
                            @else
                                <input type="text" id="phone" name="phoneNumber" placeholder="☎️"
                                    class="form-control @error('phoneNumber') is-invalid @enderror" required
                                    value="{{ old('phoneNumber') }}">
                            @endif

                            @error('phoneNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                     <!--   <div class="mb-3">
                            <p><strong>numero de casa/apartamento</strong></p>

                            <input type="text" id="unumber" name="unitNumber" placeholder="🏡"
                                class="form-control @error('unitNumber') is-invalid @enderror" required
                                value="{{ old('unitNumber') }}">

                            @error('unitNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> -->
                      <!--  <div class="mb-3">
                            <p><strong>Numero de la calle</strong></p>

                            <input type="text" id="snumber" name="streetNumber" placeholder="🏡 "
                                class="form-control @error('streetNumber') is-invalid @enderror" required
                                value="{{ old('streetNumber') }}">

                            @error('streetNumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> -->
                        <div class="mb-3">
                            <p><strong>Nombre de Calle</strong><br></p>

                            <input type="text" id="stname" name="streetName" placeholder="🏡"
                                class="form-control @error('streetName') is-invalid @enderror" required
                                value="{{ old('streetName') }}">

                            @error('streetName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p><strong>ubicacion o referencia</strong><br></p>

                            @if (session()->exists('sbname'))
                                @if (!empty(session()->get('sbname')))
                                    <input type="text" id="sbname" name="suburb" placeholder="🏙️"
                                        class="form-control @error('suburb') is-invalid @enderror" required
                                        value="{{ session()->get('sbname') }}">
                                @else
                                    <input type="text" id="sbname" name="suburb" placeholder="🏙️"
                                        class="form-control @error('suburb') is-invalid @enderror" required
                                        value="{{ old('suburb') }}">
                                @endif
                            @else
                                <input type="text" id="sbname" name="suburb" placeholder="🏙️"
                                    class="form-control @error('suburb') is-invalid @enderror" required
                                    value="{{ old('suburb') }}">
                            @endif

                            @error('sbname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <p><strong>Destino</strong><br></p>

                            @if (session()->exists('dsbname'))
                                @if (!empty(session()->get('dsbname')))
                                    <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️"
                                        class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                        value="{{ session()->get('dsbname') }}">
                                @else
                                    <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️"
                                        class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                        value="{{ old('destinationSuburb') }}">
                                @endif
                            @else
                                <input type="text" id="dsbname" name="destinationSuburb" placeholder="🏙️"
                                    class="form-control @error('destinationSuburb') is-invalid @enderror" required
                                    value="{{ old('destinationSuburb') }}">
                            @endif

                            @error('sbname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <p><strong>Vehiculo que requiere?</strong><br></p>

                            @error('carsNeed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-check form-check-inline">
                                <label>

                                    @if (session()->exists('carsNeed'))
                                        @if (!empty(session()->get('carsNeed')))
                                            @if (session()->get('carsNeed') == 'Scooter')
                                                <input class="form-check-input @error('carsNeed') is-invalid @enderror"
                                                    type="radio" name="carsNeed" id="carsNeed" value="Scooter" checked
                                                    required value="{{ session()->get('carsNeed') }}">
                                                    <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" required>
                                                    <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                            @endif
                                        @else
                                            @if (old('carsNeed') == 'Scooter')
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" checked required>
                                                    <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value="Scooter" checked required>
                                                    <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                            @endif
                                        @endif
                                    @else
                                        @if (old('carsNeed') == 'Scooter')
                                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                value="Scooter" checked required>
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                        @else
                                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                value="Scooter" checked required>
                                                <img src="assets/img/cars/Scooter.png" alt="Car 1" style="width: 80px; height: auto;">

                                        @endif
                                    @endif

                                </label>
                            </div>

                            @php
                                $cars = ['Sedan', 'Van'];
                                $carCount = 2;
                            @endphp

                            @foreach ($cars as $car)
                                <div class="form-check form-check-inline">
                                    <label>
                                        @if (session()->exists('carsNeed'))
                                            @if (!empty(session()->get('carsNeed')))
                                                @if (session()->get('carsNeed') == $car)
                                                    <input class="form-check-input @error('carsNeed') is-invalid @enderror"
                                                        type="radio" name="carsNeed" id="carsNeed"
                                                        value={{ $car }} checked required
                                                        value="{{ session()->get('carsNeed') }}">
                                                    <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                        alt="Car {{ $carCount }}" >
                                                @else
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} required>
                                                    <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                        alt="Car {{ $carCount }}">
                                                @endif
                                            @else
                                                @if (old('carsNeed') == $car)
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} checked required>
                                                    <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                        alt="Car {{ $carCount }}">
                                                @else
                                                    <input class="form-check-input" type="radio" name="carsNeed"
                                                        id="carsNeed" value={{ $car }} required>
                                                    <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                        alt="Car {{ $carCount }}">
                                                @endif
                                            @endif
                                        @else
                                            @if (old('carsNeed') == $car)
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value={{ $car }} checked required>
                                                <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                    alt="Car {{ $carCount }}">
                                            @else
                                                <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                                    value={{ $car }} required>
                                                <img src="assets/img/cars/{{ $car }}.png"  style="width: 100px; height: auto;
                                                    alt="Car {{ $carCount }}">
                                            @endif
                                        @endif

                                        @php

                                            $carCount++;
                                        @endphp
                                    </label>
                                </div>
                            @endforeach

                        </div>

                        <div class="mb-3">
                            <p><strong>Fecha de recojo</strong><br></p>

                            @if (session()->exists('pickUpDate'))
                                @if (!empty(session()->get('pickUpDate')))
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required
                                        value={{ session()->get('pickUpDate') }}>
                                @else
                                    @if (empty(old('pickUpDate')))
                                        <input
                                            class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                            type="date" id="pickUpDate" name="pickUpDate" required
                                            value={{ date('Y-m-d') }}>
                                    @else
                                        <input
                                            class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                            type="date" id="pickUpDate" name="pickUpDate" required
                                            value={{ old('pickUpDate') }}>
                                    @endif
                                @endif
                            @else
                                @if (empty(old('pickUpDate')))
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required value={{ date('Y-m-d') }}>
                                @else
                                    <input class="form-control form-control-lg @error('pickUpDate') is-invalid @enderror"
                                        type="date" id="pickUpDate" name="pickUpDate" required
                                        value={{ old('pickUpDate') }}>
                                @endif
                            @endif

                            @error('pickUpDate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            @php
                                $dateTime = new DateTime('now', new DateTimeZone('America/La_Paz'));
                            @endphp

                            <p><strong>Hora de recojo</strong><br></p>

                            @if (empty(old('pickUpTime')))
                                <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                    type="time" id="pickUpTime" name="pickUpTime" required
                                    value={{ $dateTime->format('H:i A') }}>
                            @else
                                <input class="form-control form-control-lg @error('pickUpTime') is-invalid @enderror"
                                    type="time" id="pickUpTime" name="pickUpTime" required value={{ old('pickUpTime') }}>
                            @endif

                            @error('pickUpTime')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="d-flex d-xxl-flex justify-content-xxl-center mb-3">
                            <input class="btn btn-secondary flex-fill" type="submit" name="book-button"
                                style="background: rgb(254,209,54);" value="RESERVAR">

                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <section id="map-head" class="map-clean" id="ride-map" style="margin-top: 70px;">
                        <div class="container">
                            <div class="intro">
                                <h3 class="text-center">Ubicacion</h3>
                                <p class="text-center">Mapa</p>
                            </div>
                        </div><iframe allowfullscreen frameborder="0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB3YYb5sin7I3vXQiaX02RIp9zQn91ClLY&amp;q=Cochabamba&amp;zoom=15"
                            width="100%" height="450"></iframe>
                    </section>
                    <div class="container mt-4">
        <h1>En Espera</h1>
        <table class="table table-striped table tablesorter" id="ipi-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Ciudad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Juan Pérez</td>
                    <td>25</td>
                    <td>México DF</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>María López</td>
                    <td>30</td>
                    <td>Madrid</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Carlos Rodríguez</td>
                    <td>28</td>
                    <td>Buenos Aires</td>
                </tr>
            </tbody>
        </table>
    </div>
   







                                       
                    
                </div>
            </div>
        </div>

    </section>
    <!-- End: Contact Form Clean -->
@endsection
