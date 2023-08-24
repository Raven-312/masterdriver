@extends('admin.layouts.main')

@section('container')
    @include('partials.navbar')
    <section>
        <!-- Start: Ludens - 1 Index Table with Search & Sort Filters  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <h3 class="text-dark mb-4">Bienvenido de nuevo, {{ auth()->user()->username }} </h3>
                </div>
                <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;">
                    <a href="all" class="btn btn-primary mx-1 mb-2 showAll" role="button" name="showAllBtn">
                        <i class="fa fa-plus"></i>&nbsp;Mostrar todas las Reservas </a>
                    <a href="recent" class="btn btn-primary mx-1 mb-2 showRecent" role="button" name="showRecentBtn">
                        <i class="fa fa-plus"></i>&nbsp;Mostrar las reservas recientes</a>
                    <a href="avail" class="btn btn-primary mx-1 mb-2 showAvailPassengers" role="button"
                        name="showAvailPassengersBtn">
                        <i class="fa fa-plus"></i>&nbsp;Mostrar las reservas disponibles </a>

                    <form action="/logout" method="POST" class="d-inline">
                        @csrf

                        <button type="submit" class="btn btn-primary mb-2">Cerrar
                            Sesion <span data-feather="log-out"></span></button>
                    </form>

                </div>
            </div>
            <!-- Start: TableSorter -->
            <div class="card" id="TableSorterCard">
                <div class="card-header py-3">
                    <div class="row table-topper align-items-center justify-content-between">
                        <div class="col-lg-5 text-start">
                            <p class="text-primary m-0 fw-bold">Todas las reservas</p>
                        </div>
                        <div class="py-2 text-end">

                            @if ($errors->any())
                                <div class="alert alert-danger text-center" style="margin-top:0%">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <form action="assign-button" method="POST" class="form-inline">
                                @csrf

                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="bookingInput" id="booking"
                                            placeholder="Assign Booking Number">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" name="assignBtn" value="assignBtn"
                                            class="btn btn-primary flex-fill py-2 mb-2 assignBtn">
                                            <i class="far fa-paper-plane"></i> Asignar</button>
                                    </div>
                                </div>
                            </form>

                            <form action="search-button" method="POST" class="form-inline">
                                @csrf

                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <input class="form-control mb-2" type="text" name="bookingInput" id="booking"
                                            placeholder="Search Booking Number">
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

                                @if ($agent->isMobile())
                                    <table class="table table-striped table tablesorter" id="ipi-table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">Nro de Reserva</th>
                                                <th class="text-center filter-false sorter-false">Barrio</th>
                                                <th class="text-center filter-false sorter-false">Barrio destino</th>
                                                <th class="text-center filter-false sorter-false">Fecha de recojo</th>
                                                <th class="text-center filter-false sorter-false">Hora de Recojo</th>
                                                <th class="text-center filter-false sorter-false">Estado</th>
                                                <th class="text-center filter-false sorter-false">Vehiculo:</th>
                                                <th class="text-center filter-false sorter-false">acciones</th>
                                            </tr>
                                        </thead>

                                        @foreach ($passengers as $passenger)
                                            <tbody class="text-center">
                                                <tr id="{{ $passenger->bookingRefNo }}">
                                                    <td name="bookingRefNo">{{ $passenger->bookingRefNo }}</td>
                                                    <td>{{ $passenger->suburb }}</td>
                                                    <td>{{ $passenger->destinationSuburb }}</td>
                                                    <td>{{ $passenger->pickUpDate }}</td>
                                                    <td>{{ $passenger->pickUpTime }}</td>
                                                    <td>{{ $passenger->status }}</td>
                                                    <td><img src="/assets\img\cars\{{ $passenger->carsNeed }}.png"
                                                            alt="{{ $passenger->carsNeed }}"><br>{{ $passenger->carsNeed }}
                                                    </td>
                                                    @if ($passenger->status == 'Assigned')
                                                        <td class="text-center align-middle"
                                                            style="max-height: 60px;height: 60px;">
                                                            <a class="btn btn-primary disabled" role="button"
                                                                aria-disabled="true">
                                                                Mas Info
                                                        </td>
                                                    @else
                                                        <td class="text-center align-middle"
                                                            style="max-height: 60px;height: 60px;">

                                                            <button type="submit" class="btn btn-primary"
                                                                name="bookingRefNo" data-bs-toggle="modal"
                                                                data-bs-target="#moreInfoModal">
                                                                Mas Info
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="moreInfoModal" tabindex="-1"
                                                                aria-labelledby="moreInfoModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="moreInfoModalLabel">Customer Name:
                                                                                {{ $passenger->customerName }}</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Reserva Nro Ref:
                                                                            {{ $passenger->bookingRefNo }}
                                                                            <br>
                                                                            Nombre Cliente: {{ $passenger->customerName }}
                                                                            <br>
                                                                            Telefono: {{ $passenger->phoneNumber }}
                                                                            <br>
                                                                            Nro de Unidad: {{ $passenger->unitNumber }}
                                                                            <br>
                                                                            Nro de Calle: {{ $passenger->streetNumber }}
                                                                            <br>
                                                                            Nombre de Calle: {{ $passenger->streetName }}
                                                                            <br>
                                                                            Barrio: {{ $passenger->suburb }}
                                                                            <br>
                                                                            Barrio Destino:
                                                                            {{ $passenger->destinationSuburb }}
                                                                            <br>
                                                                            Barrio Destino:
                                                                            {{ $passenger->destinationSuburb }}
                                                                            <br>
                                                                            Fecha de Recojo:
                                                                            {{ $passenger->pickUpDate }}
                                                                            <br>
                                                                            Hora de recojo:
                                                                            {{ $passenger->pickUpTime }}
                                                                            <br>
                                                                            Estado: {{ $passenger->status }}
                                                                            <br>
                                                                            Vehiculo: <img
                                                                                src="/assets\img\cars\{{ $passenger->carsNeed }}.png"
                                                                                alt="{{ $passenger->carsNeed }}">
                                                                            <br>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>

                                                                            <form action="assign" method="post"
                                                                                class="d-inline">
                                                                                @csrf

                                                                                <button type="submit" name="bookingRefNo"
                                                                                    value="{{ $passenger->bookingRefNo }}"
                                                                                    class="btn btn-primary"><i
                                                                                        class="far fa-paper-plane"></i>&nbsp;Asignar</a></button>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                @else
                                    <table class="table table-striped table tablesorter" id="ipi-table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">Reserva Nro Ref</th>
                                                <th class="text-center">Nombre Cliente</th>
                                                <th class="text-center">Telefono</th>
                                                <th class="text-center filter-false sorter-false">Nro de Unidad</th>
                                                <th class="text-center filter-false sorter-false">Nro de Calle</th>
                                                <th class="text-center filter-false sorter-false">Nombre Calle</th>
                                                <th class="text-center filter-false sorter-false">Barrio</th>
                                                <th class="text-center filter-false sorter-false">Barrio Destino</th>
                                                <th class="text-center filter-false sorter-false">Fecha Recojo</th>
                                                <th class="text-center filter-false sorter-false">Hora Recojo</th>
                                                <th class="text-center filter-false sorter-false">Estado</th>
                                                <th class="text-center filter-false sorter-false">Vehiculo</th>
                                                <th class="text-center filter-false sorter-false">Asignado por</th>
                                                <th class="text-center filter-false sorter-false">Eliminar</th>
                                                <th class="text-center filter-false sorter-false">accion</th>
                                            </tr>
                                        </thead>

                                        @foreach ($passengers as $passenger)
                                            <tbody class="text-center">
                                                <tr id="{{ $passenger->bookingRefNo }}">
                                                    <td name="bookingRefNo">{{ $passenger->bookingRefNo }}</td>
                                                    <td>{{ $passenger->customerName }}</td>
                                                    <td>{{ $passenger->phoneNumber }}</td>
                                                    <td>{{ $passenger->unitNumber }}</td>
                                                    <td>{{ $passenger->streetNumber }}</td>
                                                    <td>{{ $passenger->streetName }}</td>
                                                    <td>{{ $passenger->suburb }}</td>
                                                    <td>{{ $passenger->destinationSuburb }}</td>
                                                    <td>{{ $passenger->pickUpDate }}</td>
                                                    <td>{{ $passenger->pickUpTime }}</td>
                                                    <td>{{ $passenger->status }}</td>
                                                    <td><img src="/assets\img\cars\{{ $passenger->carsNeed }}.png"
                                                            alt="{{ $passenger->carsNeed }}"><br>{{ $passenger->carsNeed }}
                                                    </td>
                                                    
                                                    <td>{{ $passenger->assignedBy }}</td>
                                                    <td>
                                                            <form action="" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
        <i class="fas fa-trash"></i>
    </button>
</form>
                                                            </td>
                                                    @if ($passenger->status == 'Assigned')
                                                        <td class="text-center align-middle"
                                                            style="max-height: 60px;height: 60px;">
                                                            <a class="btn btn-primary disabled" role="button"
                                                                aria-disabled="true">
                                                                <i class="far fa-paper-plane"></i>&nbsp;Asignar</a>
                                                        </td>
                                                    @else
                                                        <td class="text-center align-middle"
                                                            style="max-height: 60px;height: 60px;">

                                                            <form action="assign" method="post" class="d-inline">
                                                                @csrf

                                                                <button type="submit" name="bookingRefNo"
                                                                    value="{{ $passenger->bookingRefNo }}"
                                                                    class="btn btn-primary"><i
                                                                        class="far fa-paper-plane"></i>&nbsp;Asignar</a></button>
                                                                        
                                                            </form>  
                                                               
                                                        </td>
                                                        
                                                    @endif
                                                </tr>
                                                
                                            </tbody>
                                        @endforeach
                                    </table>
                                @endif
                                <div class="d-flex justify-content-end">
                                    {{ $passengers->links() }}
                                </div>
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

