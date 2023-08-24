@extends('admin.layouts.main')

@section('container')
    @include('partials.navbarAdmin')
    <section>
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Congratulations!',
                    html: '{!! session('success') !!}'
                })
            </script>
        @endif

        @if (session()->has('unassignedError'))
            <script>
                Swal.fire(
                    'Error!',
                    '{{ session('unassignedError') }}',
                    'error'
                )
            </script>
        @endif

        <!-- Start: Ludens - 1 Index Table with Search & Sort Filters  -->
        <div class="container-fluid">
<div class="row">
<div class="col-12 col-sm-2 col-md-2">
<h3 class="text-dark mb-4">¡Bienvenido de nuevo, {{ auth()->user()->username }}!</h3>
</div>
<div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;">
<a href="admin/all" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
<i class="fa fa-plus"></i>&nbsp;Mostrar todas las reservas</a>
<a href="{{ route('drivers.index') }}" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
    <i class="fa fa-plus"></i> Agregar Nuevo Conductor
</a>

<a href="{{ route('cars.index') }}" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
    <i class="fa fa-plus"></i> Agregar Nuevo Vehiculo
</a>

<a href="admin/recent" class="btn btn-primary mx-1 mb-2 showRecent" role="button" name="showRecentBtn">
<i class="fa fa-plus"></i>&nbsp;Mostrar reservas recientes</a>
<a href="admin/avail" class="btn btn-primary mx-1 mb-2 showAvailPassengers" role="button"
name="showAvailPassengersBtn">
<i class="fa fa-plus"></i>&nbsp;Mostrar todas las reservas disponibles</a>

<form action="/logout" method="POST" class="d-inline">
@csrf
<button type="submit" class="btn btn-primary mb-2">Cerrar sesión <span data-feather="log-out"></span></button>
</form>
</div>
</div>
</div>
            <!-- Start: TableSorter -->
            <div class="card" id="TableSorterCard">
                <div class="card-header py-3">
                    <div class="row table-topper align-items-center justify-content-between">
                        <div class="col-lg-5 text-start">
                            <p class="text-primary m-0 fw-bold">Todas las Reservas</p>
                        </div>
                        <div class="py-2 text-end">

                            @if ($errors->any())
                                <div class="alert alert-danger text-center" style="margin-top:0%">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <form action="admin/assign-button" method="POST" class="form-inline">
                                @csrf

                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="bookingInput" id="booking"
                                            placeholder="numero de reserva">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" name="assignBtn" value="assignBtn"
                                            class="btn btn-primary flex-fill py-2 mb-2 assignBtn">
                                            <i class="far fa-paper-plane"></i> Asignar</button>
                                    </div>
                                </div>
                            </form>

                            <form action="admin/search-button" method="POST" class="form-inline">
                                @csrf

                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="bookingInput" id="booking"
                                            placeholder="Buscar numero de reserva">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" name="searchBtn" value="searchBtn"
                                            class="btn btn-primary flex-fill py-2 mb-2 assignBtn">
                                            <i class="far fa-paper-plane"></i> Buscar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="tableID">
                                <b class="text-warning">La Informacion de las reservas se mostrará aqui.</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: TableSorter -->
        </div>
        <!-- End: Ludens - 1 Index Table with Search & Sort Filters  -->
    </section>
@endsection
