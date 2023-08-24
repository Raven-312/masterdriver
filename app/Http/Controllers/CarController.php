<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class CarController extends Controller

{
    protected $agent;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('estado', 1)->get();

        return view('cars.index', [
            'cars' => $cars,
            'title' => 'Lista de Vehículos',
            'agent' => $this->agent,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $agent = new Agent();
       $title = "Crear Nuevo Conductor"; // Agrega esta línea
        return view('cars.create', compact('agent', 'title'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
   // Validación de los datos del formulario
   $request->validate([
    'marca' => 'required',
    'modelo' => 'required',
    'capacidad' => 'required',
    'placa' => ["required", Rule::unique('cars', 'placa')],
]);

try {
    // Crear una nueva instancia del modelo Car
    $car = new Car();
    $car->marca = $request->marca;
    $car->modelo = $request->modelo;
    $car->capacidad = $request->capacidad;
    $car->placa = $request->placa;
    
    // Guardar el vehículo en la base de datos
    $car->save();

    // Puedes redirigir a una página de éxito o realizar cualquier otra acción necesaria
    return redirect()->route('cars.index')->with('success', 'Vehículo creado exitosamente.');
} catch (\Exception $e) {
    // Manejo de la excepción: puedes registrarla, mostrar un mensaje de error, redirigir, etc.
    return $e;
    // Ejemplo: return redirect()->route('cars.index')->with('error', 'Hubo un error al crear el vehículo.');
}
}

public function edit(Car $car)
{
    return view('cars.edit', [
        'car' => $car,
        'title' => 'Modificar Vehículo',
        'agent' => $this->agent,
    ]);
}


public function update(Request $request, Car $car)
{
    $request->validate([
        'marca' => 'required',
        'modelo' => 'required',
        'capacidad' => 'required',
        'placa' => ['required', Rule::unique('cars')->ignore($car->id)],
    ]);

    $car->marca = $request->marca;
    $car->modelo = $request->modelo;
    $car->capacidad = $request->capacidad;
    $car->placa = $request->placa;

    // Agregar aquí cualquier otra propiedad que quieras actualizar

    $car->save();

    return redirect()->route('cars.index')
        ->with('success', 'Vehículo actualizado correctamente');
}


public function destroy($id)
{
    $car = Car::findOrFail($id);

    $car->estado = 0;
    $car->save();

    return redirect()->route('cars.index')
        ->with('success', 'Vehículo inactivado correctamente');
}

    
}
