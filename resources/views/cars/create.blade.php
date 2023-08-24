@extends('admin.layouts.main')

@section('container')
    @include('partials.navbarAdmin')
    <section>
    <div class="container">
        <h1>Registrar Vehiculo</h1>
        <form action="{{ route('cars.store') }}" method="POST" class="d-inline">

            @csrf
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="text" class="form-control" id="capacidad" name="capacidad" required>
            </div>
        
            <button type="submit" class="btn btn-primary" >Agregar Vehiculo</button>
        </form>
    </div>
    </section>
@endsection


