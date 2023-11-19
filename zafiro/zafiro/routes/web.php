<?php

use App\Http\Controllers\CrudControllerApartamento;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//--------------Rutas Apartamentos------------///

//Ruta Apartamentos
Route::get('/apartamentos', [CrudControllerApartamento::class,"index"])->name("crud.index");


//Ruta Registrar Usuarios Apartamentos
Route::post('/registrar-apartamento', [CrudControllerApartamento::class,"create"])->name("crud.create");

//Ruta Modificar Apartamentos
Route::post('/modificar-apartamento', [CrudControllerApartamento::class,"update"])->name("crud.update");

//Ruta Eliminar Apartamentos
Route::get('/eliminar-apartamento-{id}', [CrudControllerApartamento::class,"delete"])->name("crud.delete");

//--------------Rutas Usuarios------------///

Route::get('/usuarios', [CrudControllerApartamento::class,"usuariosre"])->name("crud.usuariosre");

//Ruta Registrar Usuarios 
Route::post('/registrar-usuario', [CrudControllerApartamento::class,"createuser"])->name("crud.createuser");

//Ruta Modificar Usuarios
Route::post('/modificar-usuario', [CrudControllerApartamento::class,"updateuser"])->name("crud.updateuser");


//Ruta Eliminar Apartamentos
Route::get('/eliminar-user-{id}', [CrudControllerApartamento::class,"deleteuser"])->name("crud.deleteuser");




//--------------Rutas Pagos------------///

Route::get('/pagos', [CrudControllerApartamento::class,"usuariospagos"])->name("crud.usuariospagos");

//Ruta Registrar Usuarios 
Route::post('/registrar-pagos', [CrudControllerApartamento::class,"createpagos"])->name("crud.createpagos");

//Ruta Modificar Usuarios
Route::post('/modificar-pagos', [CrudControllerApartamento::class,"updatepagos"])->name("crud.updatepagos");


//Ruta Eliminar Apartamentos
Route::get('/eliminar-pagos-{id}', [CrudControllerApartamento::class,"deletepagos"])->name("crud.deletepagos");


//--------------Rutas Deudas------------///

Route::get('/deudas', [CrudControllerApartamento::class,"usuariosdeudas"])->name("crud.usuariosdeudas");

//Ruta Registrar Usuarios 
Route::post('/registrar-deudas', [CrudControllerApartamento::class,"createdeudas"])->name("crud.createdeudas");

//Ruta Modificar Usuarios
Route::post('/modificar-deudas', [CrudControllerApartamento::class,"updatedeudas"])->name("crud.updatedeudas");


//Ruta Eliminar Apartamentos
Route::get('/eliminar-deudas-{id}', [CrudControllerApartamento::class,"deletedeudas"])->name("crud.deletedeudas");






//--------------Rutas Menu------------///

Route::get('/', function () {
    return view('home');
});

/*
Route::get('/usuarios', function () {
    return view('usuarios');
});
*/

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
