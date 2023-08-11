<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Crearturno; // llamo controlador de livewire
use App\Http\Livewire\Crearturnoestudio; // llamo controlador de livewire
use App\Http\Livewire\Cargarfechas; // llamo controlador de livewire
use App\Http\Livewire\Turnospendientes; // llamo controlador de livewire

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

Route::get('/', function () {
    return view('welcome'); // vista principal de ejemplo en views -> welcome.blade.php
});


 //ruta para pestaña profesionales
 //ruta para pestaña pACIENTES
/*Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes', function () {
   


})->name('pacientes');*/

  //Route::get('pacientes', [UserController::class, 'index']);  


 // Route::resource('pacientes','App\Http\Controllers\UserController'); //resource es el tipo de controlador


// rutas accesibles para el admin luego de pasar por el midl admin y luego por el mid auth (autenticacion) 
Route::middleware(['auth:sanctum','verified'])->group(function (){
   Route::get('pacientes','App\Http\Controllers\AdminController@index')->name('pacientes'); // vista plantilla mivista.blade
   
   Route::get('reedirigir','App\Http\Controllers\RolController@index'); // controlador para reedirigir segun rol de usuario
   Route::get('admin','App\Http\Controllers\AdminController@adprincipal')->name('dash_admin'); // controlador para reedirigir a pantalla principal de admin
   Route::get('usuario','App\Http\Controllers\UserController@usprincipal')->name('dash_user'); // controlador para reedirigir a pantalla principal de user
  
   
   Route::get('profesionales','App\Http\Controllers\ProfesionalController@index')->name('profesionales'); // vista plantilla profesionales.blade
  
   Route::get('/dashboard', function () {
    
})->name('dashboard');




//Route::view('fechas_horas', 'livewire.crearturno');
   //llama a @destroy para borrar usuario desde boton del form
   Route::delete('/pacientes{id}','App\Http\Controllers\AdminController@destroy')->name('eliminar'); //
    // llama a vista editar de usercontroller y pasa datos del usuario a los input del form 
   Route::get('/editar{id}','App\Http\Controllers\AdminController@edit')->name('editar'); // vista editar que trae el id de tabla
   Route::get('/editar{id}','App\Http\Controllers\ProfesionalController@edit')->name('editprof'); // vista editar que trae el id de tabla
  
  
   Route::put('/editar{id}','App\Http\Controllers\AdminController@update')->name('edicion'); // llama a @update para actualizar tabla desde imput del form
   Route::put('/editar{id}','App\Http\Controllers\ProfesionalController@update')->name('edicion'); // llama a @update para actualizar tabla profesionales
  
  
  
   Route::get('/crear_usuario','App\Http\Controllers\AdminController@create')->name('crear_pac'); // vista create pacientes
   
     
   
   Route::get('/ver_turnos','App\Http\Controllers\CrearturnoController@ver_turnos')->name('verturnos'); // vista ver turnos pendientes
   
   Route::get('/cargahoras{id}','App\Http\Controllers\HorarioController@index')->name('creahoras'); // vista cargar horas para prof
   
  
   
  
  
   Route::post('/create_horas','App\Http\Controllers\HorarioController@store')->name('asignahoras'); // cargar horas estudios
  
   Route::delete('/create_horas{id}','App\Http\Controllers\HorarioController@destroy')->name('eliminar_hora'); // cargar horas estudios
  

   Route::delete('/estudios{id}','App\Http\Controllers\CrearturnoController@borra_estudio')->name('eliminar_estudio'); // eliminar estudio pendiente

   Route::get('/create','App\Http\Controllers\ProfesionalController@create')->name('crearpr'); // vista create profesional
  
   Route::post('/crear_usuario','App\Http\Controllers\AdminController@store')->name('creacion'); // llama a @store para guardar en bd desde imput del form
   Route::post('/crear_esp','App\Http\Controllers\EspecialidadController@store')->name('nuevaEsp'); // llama a @store para guardar nueva especialidad

   Route::post('/create','App\Http\Controllers\ProfesionalController@store')->name('crear_prof'); // llama a @store para guardar en bd desde imput del form
   Route::delete('/profesionales{id}','App\Http\Controllers\ProfesionalController@destroy')->name('eliminar_prof'); // eliminar profesional
   Route::delete('/especialidades{id}','App\Http\Controllers\EspecialidadController@destroy')->name('eliminar_esp'); // eliminar especialidad

   Route::get('/tipo_turno','App\Http\Controllers\CrearturnoController@create')->name('nuevo_turno'); // vista create pacientes
  
   Route::get('fechas_horas',Crearturno::class,'render')->name('fechas');//pantalla crear consulta
   Route::get('crear_estudio',Crearturnoestudio::class,'render')->name('tipo_estudio'); //pantalla crear estudio
   Route::get('verturnos',Turnospendientes::class,'render')->name('pendientes'); //pantalla verturnos pendientes livewire

  // Route::get('resumen_turno',Resumenturno::class,'render')->name('resumen');
  //Route::get('/resumen_turno','App\Http\Controllers\ResumenController@index')->name('resumen'); // vista create pacientes
  
  //Route::post('crear_consulta',Crearturno::class,'crearConsulta')->name('consulta');
  // Route::get('/fechas_horas{id}','App\Http\Controllers\CrearturnoController@')->name('fecha'); // 
  
  Route::post('/crear_consulta','App\Http\Controllers\CrearturnoController@store')->name('consulta'); // guardar consulta
  Route::post('/crear_estudio','App\Http\Controllers\CrearturnoController@guarda_estudio')->name('estudio'); // guardar estudio
  
 Route::get('cargarfechas{id}',Cargarfechas::class)->name('cargafechas'); //pantalla crear fechas de trabajo para prof
 //Route::get('nuevasfechas',Cargarfechas::class)->name('nuevasfechas'); //pantalla crear fechas de trabajo para prof

  //Route::post('/cargarfechas','App\Http\Controllers\CrearturnoController@guardafechas')->name('creafechas'); // guardar fechas crrect
  //Route::post('/cargarfechas','App\Http\Controllers\CrearturnoController@borrarfechas')->name('borrarfechas'); // guardar fechas
 
 // Route::get('cargarfechas', Cargarfechas::class)->name('nuevafecha');

Route::get('/resumen', function () {
    return view('layouts/admin/crearTurno/resumen_turno'); // vista principal de ejemplo en views -> welcome.blade.php
})->name('resumen');

    });
    

   /* Route::middleware(['admin','auth:sanctum', 'verified'])->group(function (){

        Route::get('profesionales','App\Http\Controllers\ProfesionalController@index')->name('profesionales'); // vista plantilla profesionales.blade
  

    });*/


    Route::get('/especialidades','App\Http\Controllers\EspecialidadController@vistaEspecialidades')->name('vistaEsp'); // vista nueva especialidad
  
    Route::get('/listarhoras','App\Http\Controllers\HorarioController@listarHoras')->name('listarhs'); // vista listar horas generales
    Route::post('/crear_hora','App\Http\Controllers\HorarioController@guarda_hs')->name('nuevahora'); // llama a @store para guardar nueva especialidad
    Route::delete('/horas{id}','App\Http\Controllers\HorarioController@eliminaHora')->name('borra_hs'); // eliminar especialidad
