
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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/Employes', [App\Http\Controllers\EmployesController::class, 'index'])->middleware('auth');
Route::post('/Employes/traitement', [App\Http\Controllers\EmployesController::class, 'addEmployes_traitement']);
Route::get('/Employes/{id}', [App\Http\Controllers\EmployesController::class, 'display_employe_info'])->middleware('auth');
Route::get('/Employes/update_show/{id}', [App\Http\Controllers\EmployesController::class, 'updateEmployes'])->middleware('auth');
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


Route::get('/Materiel/imprimante', [App\Http\Controllers\Imprimante_Controller::class, 'imprimantes'])->middleware('auth');
Route::get('/add_imprimante', [App\Http\Controllers\Imprimante_Controller::class, 'imprimantes_add'])->middleware('auth');
Route::post('/Materiel/imprimante/traitement', [App\Http\Controllers\Imprimante_Controller::class, 'addimprimante_traitement'])->middleware('auth');
Route::post('/Materiel/Imprimante/DeleteAll', [App\Http\Controllers\Imprimante_Controller::class, 'DeleteAll'])->middleware('auth');
Route::get('/Materiel/imprimante/{id}', [App\Http\Controllers\Imprimante_Controller::class, 'imprimante_info'])->middleware('auth');
Route::get('/Materiel/Imprimante/update/{id}', [App\Http\Controllers\Imprimante_Controller::class, 'imprimantes_update'])->middleware('auth');
Route::post('/Materiel/Imprimante/update/traitement/{id}', [App\Http\Controllers\Imprimante_Controller::class, 'updateImprimante_traitement'])->middleware('auth');
Route::get('/Materiel/Imprimante/delete/{id}', [App\Http\Controllers\Imprimante_Controller::class, 'imprimantes_delete'])->middleware('auth');
Route::get('/Materiel/Imprimante/pdf/{id}', [App\Http\Controllers\Imprimante_Controller::class, 'imprimante_pdf'])->middleware('auth');


Route::get('/Materiel/Moniteur', [App\Http\Controllers\Moniteur_Controller::class, 'moniteurs'])->middleware('auth');
Route::get('/add_moniteurs', [App\Http\Controllers\Moniteur_Controller::class, 'Moniteurs_add'])->middleware('auth');
Route::post('/Materiel/Moniteur/traitement', [App\Http\Controllers\Moniteur_Controller::class, 'addMoniteur_traitement'])->middleware('auth');
Route::post('/Materiel/Moniteur/DeleteAll', [App\Http\Controllers\Moniteur_Controller::class, 'DeleteAll'])->middleware('auth');
Route::get('/Materiel/Moniteur/{id}', [App\Http\Controllers\Moniteur_Controller::class, 'Moniteur_info'])->middleware('auth');
Route::get('/Materiel/Moniteur/update/{id}', [App\Http\Controllers\Moniteur_Controller::class, 'Moniteurs_update'])->middleware('auth');
Route::post('/Materiel/Moniteur/update/traitement/{id}', [App\Http\Controllers\Moniteur_Controller::class, 'updateMoniteur_traitement'])->middleware('auth');
Route::get('/Materiel/Moniteur/delete/{id}', [App\Http\Controllers\Moniteur_Controller::class, 'Moniteurs_delete'])->middleware('auth');
Route::get('/Materiel/Moniteur/pdf/{id}', [App\Http\Controllers\Moniteur_Controller::class, 'Moniteur_pdf'])->middleware('auth');


Route::get('/Materiel/Mobile', [App\Http\Controllers\Mobile_Controller::class, 'Mobiles'])->middleware('auth');
Route::get('/add_mobile', [App\Http\Controllers\Mobile_Controller::class, 'Mobiles_add'])->middleware('auth');
Route::post('/Materiel/Mobile/traitement', [App\Http\Controllers\Mobile_Controller::class, 'addMobile_traitement'])->middleware('auth');
Route::post('/Materiel/Mobile/DeleteAll', [App\Http\Controllers\Mobile_Controller::class, 'DeleteAll'])->middleware('auth');
Route::get('/Materiel/Mobile/{id}', [App\Http\Controllers\Mobile_Controller::class, 'Mobile_info'])->middleware('auth');
Route::get('/Materiel/Mobile/update/{id}', [App\Http\Controllers\Mobile_Controller::class, 'Mobiles_update'])->middleware('auth');
Route::post('/Materiel/Mobile/update/traitement/{id}', [App\Http\Controllers\Mobile_Controller::class, 'updateMobile_traitement'])->middleware('auth');
Route::get('/Materiel/Mobile/delete/{id}', [App\Http\Controllers\Mobile_Controller::class, 'Mobiles_delete'])->middleware('auth');
Route::get('/Materiel/Mobile/pdf/{id}', [App\Http\Controllers\Mobile_Controller::class, 'Mobile_pdf'])->middleware('auth');


Route::get('/admin', [App\Http\Controllers\Admin_Controller::class, 'index'])->middleware('auth');
Route::post('/admin/SendEmail', [App\Http\Controllers\Admin_Controller::class, 'send'])->middleware('auth');



Route::get('/Attribution', [App\Http\Controllers\AffectationController::class, 'index'])->middleware('auth');
Route::post('/Attribution/traitement', [App\Http\Controllers\AffectationController::class, 'affectation'])->middleware('auth');




Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->middleware('auth');
Route::post('/history/traitement', [App\Http\Controllers\HistoryController::class, 'history_consult']);






