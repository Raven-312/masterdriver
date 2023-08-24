<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });


//Route::post('/admin/store-conductor', [DriverController::class, 'store'])->name('admin.storeConductor');

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');

Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');

Route::post('/drivers/create', [DriverController::class, 'store'])->name('drivers.store');

Route::get('/drivers/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');

Route::put('/drivers/{driver}', [DriverController::class, 'update'])->name('drivers.update');

Route::delete('/drivers/{driver}',[DriverController::class, 'destroy'])->name('drivers.destroy');
    
//

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');

Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');

Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');

Route::delete('/cars/{car}',[CarController::class, 'destroy'])->name('cars.destroy');


Route::get('/', function () {
    return view('home', [
        'title' => 'Servicio de Transporte Cochabamba']);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About | Rservas en Linea']);
});

Route::resource('/booking', PassengerController::class);
Route::match(['get', 'post'], '/continue-booking', [PassengerController::class, 'continueBooking']);

Route::get('/cancel-booking', [PassengerController::class, 'cancelBooking']);

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/admin', function () {
    return view('admin.index', [
        'title' => 'Dashboard Admin | Servicio de Transporte Cochabamba',
    ]);
})->middleware('auth');

Route::post('/admin/assign', [DriverController::class, 'assign'])
    ->middleware('auth');

Route::match(['get', 'post'], '/admin/assign-button', [DriverController::class, 'assignBtn'])
    ->middleware('auth');

Route::match(['get', 'post'], '/admin/search-button', [DriverController::class, 'searchBtn'])
    ->middleware('auth');

Route::get('/admin/all', [DriverController::class, 'showAll'])
    ->middleware('auth');

Route::get('/admin/recent', [DriverController::class, 'showRecent'])
    ->middleware('auth');

Route::get('/admin/avail', [DriverController::class, 'showAvail'])
    ->middleware('auth');
