
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Employes;

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




Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/Employes', [App\Http\Controllers\EmployesController::class, 'index'])->middleware('auth');
Route::post('/Employes/traitement', [App\Http\Controllers\EmployesController::class, 'addEmployes_traitement']);
Route::get('/Employes/{id}', [App\Http\Controllers\EmployesController::class, 'display_employe_info'])->middleware('auth');

Route::post('/Employes/update/{id}', [App\Http\Controllers\EmployesController::class, 'updateEmployes_traitement'])->middleware('auth');
Route::get('/Employes/delete/{id}', [App\Http\Controllers\EmployesController::class, 'deleteEmployes_traitement'])->middleware('auth');


Route::get('/Materiel', [App\Http\Controllers\MaterielController::class, 'index'])->middleware('auth');

Route::get('/Materiel/ordinateurs', [App\Http\Controllers\MaterielController::class, 'ordinateurs'])->middleware('auth');
Route::get('/Materiel/Ordinateur/{id}', [App\Http\Controllers\MaterielController::class, 'ordinateurs_info'])->middleware('auth');
Route::post('/Materiel/Ordinateur/traitement', [App\Http\Controllers\MaterielController::class, 'addOrdinateur_traitement'])->middleware('auth');
Route::get('/Materiel/Ordinateur/update/{id}', [App\Http\Controllers\MaterielController::class, 'ordinateurs_update'])->middleware('auth');
Route::post('/Materiel/Ordinateur/update/traitement/{id}', [App\Http\Controllers\MaterielController::class, 'updateOrdinateur_traitement'])->middleware('auth');
Route::get('/Materiel/Ordinateur/delete/{id}', [App\Http\Controllers\MaterielController::class, 'ordinateurs_delete'])->middleware('auth');
Route::get('/Materiel/Ordinateur/pdf/{id}', [App\Http\Controllers\MaterielController::class, 'ordinateurs_pdf'])->middleware('auth');

Route::post('/Materiel/Ordinateur/DeleteAll', [App\Http\Controllers\MaterielController::class, 'DeleteAll'])->middleware('auth');


Route::get('/add', [App\Http\Controllers\MaterielController::class, 'ordinateurs_add'])->middleware('auth');
Route::post('/Materiel/Ordinateur/export', [App\Http\Controllers\MaterielController::class, 'ordinateurs_excel'])->middleware('auth');


Route::get('/Affectation', [App\Http\Controllers\AffectationController::class, 'index'])->middleware('auth');
Route::post('/Affectation/traitement', [App\Http\Controllers\AffectationController::class, 'affectation'])->middleware('auth');










