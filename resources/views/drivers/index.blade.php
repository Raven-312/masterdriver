@extends('admin.layouts.main')

@section('container')
    @include('partials.navbarAdmin')
    <section>
        <a href="{{ route('drivers.create')}}" class="btn btn-primary">Crear</a>
            <!-- Start: TableSorter -->
  
       <div class="card" id="TableSorterCard">
    <div class="card-header py-3">
        <div class="row table-topper align-items-center justify-content-between">
            <div class="col-lg-5 text-start">
                <p class="text-primary m-0 fw-bold">Todas los Conductores</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table tablesorter" id="ipi-table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Email</th>
                            <th class="text-center filter-false sorter-false">Usuario</th>
                            <th class="text-center filter-false sorter-false">Tipo de Vehiculo</th>
                            <th class="text-center filter-false sorter-false">Fecha de Ingreso</th>
                            <th class="w-28 py-4 ...">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       @foreach ($drivers as $driver)
                        <tr>
                            <td class="py-3 px-6">{{ $driver->email }}</td>
                            <td class="p-3">{{ $driver->username }}</td>
                            <td class="p-3 text-center">{{ $driver->car }}</td>
                            <td class="p-3 text-center">{{ $driver->created_at }}</td>
                            <td class="p-3">
                           
                            <form action="{{ route('drivers.destroy', $driver) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-sm" onclick="return confirm('¿Estás seguro de eliminar este conductor?')">
        <i class="fas fa-trash"></i>
    </button>
</form>
                <a href="{{ route('drivers.edit', $driver) }}" class="bg-green-500 text-white px-3 py-1 rounded-sm">
    <i class="fas fa-pen"></i>
</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            <!-- End: TableSorter -->
     
        <!-- End: Ludens - 1 Index Table with Search & Sort Filters  -->
    </section>
  @endsection














