@extends('admin.layouts.main')

@section('container')
    @include('partials.navbarAdmin')
    <section>
        <div class="container">
            <h1>Modificar Vehiculo</h1>
            <form action="{{ route('cars.update', $car) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ $car->marca }}" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $car->modelo }}" required>
                </div>
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" value="{{ $car->placa }}" required>
                </div>
                <div class="mb-3">
                    <label for="Capacidad" class="form-label">Capacidad</label>
                    <input type="text" class="form-control" id="Capacidad" name="capacidad" value="{{ $car->capacidad }}" required>
                </div>
                <div class="mb-3">
                
                <button type="submit" class="btn btn-primary" >Actualizar Vehiculo</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        </div>
    </section>
@endsection
