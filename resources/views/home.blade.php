@extends('layouts.main')

@section('container')
    @include('partials.homeHeader')

    <section id="about" style="margin-top: -75px;">
        <div class="container">
            <div class="row row-about">
            <div class="col-lg-12 text-center" data-aos="zoom-in" data-aos-duration="500" data-aos-once="true">
    <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o"
            style="color: rgb(254,209,54);"></i><br><strong>Servicios de Taxis en Línea</strong><br></h3>
    <div id="div-about" class="text-center">
        <h2 class="text-uppercase"><strong>CÓMO FUNCIONA</strong><br></h2>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ul class="list-group timeline">
            <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                        src="assets/img/about/tap.png"></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading"><strong>Reserva en Solo 2 Pasos</strong><br></h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Solo haz clic en Reservar un Viaje > Completa tu Información > Haz Clic en Reservar ¡Y ya estás listo para partir!</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
                        data-aos-once="true">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/taxi-driver.png"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading"><strong>Obtener un Conductor</strong><br></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Pronto se asignará un conductor a tu reserva y estarás en camino hacia ti.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/car.png"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading"><strong>Rastrea a tu Conductor</strong><br></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Ya sea que estés recogiendo o entregando suministros, puedes rastrear todos tus viajes.</p>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
    data-aos-once="true">
    <div class="timeline-image"><img class="rounded-circle img-fluid"
            src="assets/img/about/arrived.png"></div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="subheading"><strong>Llega Seguro</strong><br></h4>
        </div>
        <div class="timeline-body">
            <p class="text-muted">El camino por delante puede ser largo y sinuoso, ¡pero llegarás allí sano y salvo!</p>
        </div>
    </div>
</li>
<li class="list-group-item timeline-inverted" data-aos="zoom-in" data-aos-duration="1000"
    data-aos-once="true">
    <div class="timeline-image">
    <h4>¡Siente la Libertad<br>&nbsp;En Tu Viaje!<br></h4>

    </div>
</li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div id="booking-cta" class="container text-center">
        <h3>Reserva Tu Viaje Ahora</h3>

            <form class="row g-3" method="POST" action="continue-booking">
                @csrf

                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Scooter" required>
                            <img src="assets/img/cars/Scooter.png" alt="Car 1">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Hatchback" required>
                            <img src="assets/img/cars/Hatchback.png" alt="Car 2">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Suv" checked required>
                            <img src="assets/img/cars/Suv.png" alt="Car 3">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Sedan" required>
                            <img src="assets/img/cars/Sedan.png" alt="Car 4">
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label>
                            <input class="form-check-input" type="radio" name="carsNeed" id="carsNeed"
                                value="Van" required>
                            <img src="assets/img/cars/Van.png" alt="Car 5">
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <input type="text" class="form-control" id="sbname" placeholder="🏡 DE:" name="sbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="dsbname" placeholder="🏡 A:" name="dsbname">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="☎️ Telefono/Cel" id="phone" name="phone">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="pickUpDate" name="pickUpDate">
                </div>
                <div class="col-12">
                    <input class="btn btn-dark btn-lg" type="submit" name="book-button" style="border-radius: 40px;;"
                        value="reserva un Vehículo">
                </div>
            </form>
        </div>
    </section><!-- End: Highlight Phone -->
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(254,251,240);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
    <div class="div-title">
        <h2>Acerca de Nosotros</h2>
    </div>
    <p style="color: rgb(0,0,0);"><strong><em>Servicios de Transporte confiable</em></strong><br></p>
    <p>Radio Movil "Cochabamba", Los emprendedores. Somos una empresa tecnológica que conecta el mundo físico y digital 
        para facilitar el movimiento con solo un toque de botón. Porque creemos en un mundo donde el movimiento
         debe ser accesible. Así puedes moverte y ganar de manera segura. De una manera sostenible para nuestro
          planeta. En "reservas Ccochabamba", la búsqueda de la reimaginación nunca termina, nunca se detiene y siempre 
          está comenzando.</p>
    <a class="btn btn-primary" role="button" href="/booking" style="margin-left: -4px;background: rgb(59,59,59);">Reservar UN VIAJE</a>
</div>

                    <!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                    <!-- Start: Smartphone -->
                    <div class="d-none d-md-block phone-mockup taxi-about-img"><img class="device"
                            src="assets/img/taxi-1.jpg">
                        <div class="screen"></div>
                    </div><!-- End: Smartphone -->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->
   <section data-aos="zoom-in" data-aos-duration="1150" data-aos-once="true" class="py-5">
    <h3 id="seen" class="text-center">Visítanos en:</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-3 text-center"><a href="#"><img class="img-fluid mx-auto"
                        src="assets/img/clients/google.jpg"></a></div>
            <div class="col-sm-6 col-md-3 text-center"><a href="#"><img class="img-fluid mx-auto"
                        src="assets/img/clients/facebook.jpg"></a></div>
        </div>
    </div>
</section>

    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(255,192,0);">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
                        <h5 style="color: rgb(0,0,0);">Unete a Nuestro equipo<br></h5>
                        <h2><strong>Conduce con nosotros, Trabaja Cuando quieras!</strong><br></h2>
                    </div><!-- End: Intro -->
                </div>
                <div class="col-sm-4">
                <a class="btn btn-x8 btn-dark driver-btn" role="button" href="/register">Únete a nuestro equipo de conductores</a>
                </div>

            </div>
        </div>
    </section><!-- End: Highlight Phone -->
    <section id="services" style="padding-top: 90px;background: #111111;color: rgb(255,255,255);">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center" style="margin-top: -20px;">
            <h3 class="text-muted section-subheading"><i class="fa fa-dot-circle-o"
                    style="background: rgba(254,209,54,0);color: rgb(254,209,54);"></i><br><strong>Lista de Beneficios</strong><br></h3>
            <h2 class="text-uppercase section-heading benefit-space">¿Por qué elegirnos?</h2>
        </div>
    </div>
    <div class="row text-center align-up">
        <div class="col-md-4"><span class="fa-stack fa-4x"><i
                    class="fa fa-circle fa-stack-2x text-primary"></i><i
                    class="fas fa-child fa-stack-1x fa-inverse"></i></span>
            <h4 class="section-heading">Garantía de Seguridad</h4>
            <p class="text-muted">Informa a tus seres queridos dónde estás. Mantén confidenciales tus datos de contacto. Obtén ayuda con solo un toque.</p>
        </div>
        <div class="col-md-4"><span class="fa-stack fa-4x"><i
                    class="fa fa-circle fa-stack-2x text-primary"></i><i
                    class="fa fa-drivers-license-o fa-stack-1x fa-inverse"></i></span>
            <h4 class="section-heading">Conductores Confiables</h4>
            <p class="text-muted">Todos nuestros conductores pasan por verificaciones de antecedentes y verificación en tiempo real, la seguridad es una prioridad principal todos los días.</p>
        </div>
        <div class="col-md-4"><span class="fa-stack fa-4x"><i
                    class="fa fa-circle fa-stack-2x text-primary"></i><i
                    class="fa fa-dollar fa-stack-1x fa-inverse"></i></span>
            <h4 class="section-heading">Tarifas Económicas</h4>
            <p class="text-muted">Compara precios en todo tipo de viajes, desde desplazamientos diarios hasta noches especiales.</p>
        </div>
    </div>
</div>

    </section>
@endsection
