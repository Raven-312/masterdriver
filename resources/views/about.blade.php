@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <!-- Start: Highlight Phone -->
    <section class="highlight-phone" style="background: rgb(254,251,240);height: 653px;padding-top: 113px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start: Intro -->
                    <div class="intro">
    <h2>Nosotros</h2>
    <p style="color: rgb(0,0,0);"><strong><em>Servicios de Transporte confiable</em></strong><br></p>
    <p>Somos un emprendimiento que conecta el mundo físico y digital para facilitar el movimiento con solo un toque de botón. Porque creemos en un mundo donde el movimiento debe ser accesible. Así puedes moverte y ganar de manera segura. De una manera sostenible para nuestro planeta. Con Nosotros, la búsqueda de la reimaginación nunca termina, nunca se detiene y siempre está comenzando.</p>
    <a class="btn btn-primary" role="button" href="/booking" style="margin-left: -4px;background: rgb(59,59,59);">Reservar UN VIAJE</a>
</div><!-- Fin: Intro -->

                </div>
                <div class="col-sm-4">
                    <!-- Start: Smartphone -->
                    <div class="d-none d-md-block phone-mockup"><img class="device" src="assets/img/taxi-1.jpg">
                        <div class="screen"></div>
                    </div><!-- End: Smartphone -->
                </div>
            </div>
        </div>
    </section>
    <!-- End: Highlight Phone -->

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
@endsection
