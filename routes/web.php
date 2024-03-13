<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ClientController;

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

Route::middleware(['guest'])->group(function(){

    Route::get('/', [ClientController::class, 'index'])->name('init');
    Route::get('/ver-noticia/{id}', [ClientController::class, 'show_news'])->name('show_news');
    //Route::get('/mostra-noticias', [ClientController::class, 'show_news'])->name('show_news');
    Route::post('/marcar-contulta', [ClientController::class, 'make_appointment'])->name('make_appointment');

    Route::get('/login', [ManagementController::class, 'login'])->name('login');
    Route::post('/login', [ManagementController::class, 'authentication'])->name('auth');

    Route::get('/especialidades-hospital/{id}', [ClientController::class, 'categoryHealthUnity'])->name('categoryHealthUnity');
    Route::get('/especialistas/{especiality}/{health}', [ClientController::class, 'specialistHealthUnity'])->name('specialistHealthUnity');
    Route::get('/noticias', [ClientController::class, 'news'])->name('news');

});

Route::group(['prefix' => 'gerenciamento','middleware'=>['auth.check','prevent.back.history'/*'user','control','PreventBackHistory'*/]], function () {

    Route::get('/logout', [ManagementController::class, 'logout'])->name('logout');
    Route::post('/trocar-senha', [ManagementController::class, 'change_password'])->name('change_password');
    Route::post('/trocar-imagem', [ManagementController::class, 'change_image'])->name('change_image');
    Route::get('/', [ManagementController::class, 'index'])->name('management');
    Route::get('/pacientes', [ManagementController::class, 'patients'])->middleware('admin_access')->name('patients');
    Route::get('/utilizadores', [ManagementController::class, 'users'])->name('users');
    Route::get('/farmacias', [ManagementController::class, 'pharmaces'])->middleware('admin_unit_access')->name('pharmaces');
    Route::get('/profissionais', [ManagementController::class, 'professionals'])->middleware('admin_unit_access')->name('professionals');
    Route::get('/utilizadores/perfil', [ManagementController::class, 'profile'])->name('profile_users');
    Route::get('/exames-medico', [ManagementController::class, 'medical_exams'])->name('medical_exams');
    Route::get('/especialidades-medica', [ManagementController::class, 'medical_specialty'])->name('medical_specialty');
    Route::get('/doencas-cronica', [ManagementController::class, 'chronic_diseases'])->name('chronic_diseases');
    Route::get('/prescricoes', [ManagementController::class, 'prescriptions'])->name('prescriptions');
    Route::get('/alergias', [ManagementController::class, 'allergies'])->name('allergies');
    Route::post('/adicionar-alergia', [ManagementController::class, 'add_allergy'])->name('add_allergy');
    Route::post('/adicionar-doenca-cronica', [ManagementController::class, 'add_chronic'])->name('add_chronic');
    Route::get('/grupo-sanguineo', [ManagementController::class, 'blood_groups'])->name('blood_groups');
    Route::get('/medicamentos', [ManagementController::class, 'medicines'])->name('medicines');
    Route::get('/consulta-medica', [ManagementController::class, 'medical_consultation'])->name('medical_consultation');
    Route::get('/agenda-consulta', [ManagementController::class, 'appointment_schedule'])->name('appointment_schedule');
    Route::post('/eliminar-agenda-consulta/{id}', [ManagementController::class, 'delete_appointment_schedule'])->name('delete_appointment_schedule');
    Route::post('/registar-agenda-consulta', [ManagementController::class, 'register_appointment_schedule'])->name('register_appointment_schedule');
    Route::get('/consulta/{position}', [ManagementController::class, 'consultation'])->name('consultation');
    Route::get('/unidades-sanitária', [ManagementController::class, 'health_units'])->name('health_units');
    Route::get('/perfil-profissional/{id}', [ManagementController::class, 'professional_profile'])->name('professional_profile');
    Route::get('/perfil-unidade-sanitaria/{id}', [ManagementController::class, 'health_unit_profile'])->name('health_unit_profile');
    Route::get('/perfil-paciente/{id}', [ManagementController::class, 'patient_profile'])->name('patient_profile');
    Route::get('/meu-perfil', [ManagementController::class, 'my_profile'])->name('my_profile');
    Route::post('/registar-unidade-sanitaria', [ManagementController::class, 'register_health_units'])->name('register_health_units');
    Route::post('/editar-unidade-sanitaria', [ManagementController::class, 'edit_health_unit'])->name('edit_health_unit');
    Route::post('/registar-profissional', [ManagementController::class, 'register_professional'])->name('register_professional');
    Route::post('/editar-professional/{id}', [ManagementController::class, 'edit_professional'])->name('edit_professional');
    Route::get('/noticias', [ManagementController::class, 'news'])->name('news');
    Route::get('/faqs', [ManagementController::class, 'faqs'])->name('faqs');
    Route::get('/centro-medico', [ManagementController::class, 'medical_center'])->name('medical_center');
    Route::post('/adicionar-faq', [ManagementController::class, 'add_faq'])->name('add_faq');
    Route::post('/adicionar-noticias', [ManagementController::class, 'add_news'])->name('add_news');
    Route::post('/editar-noticia/{news_id}', [ManagementController::class, 'edit_news'])->name('edit_news');
    Route::get('/provincias/{country_id}', [ManagementController::class, 'provinces'])->name('provinces');
    Route::get('/municipios/{country_id}/{province_id}', [ManagementController::class, 'countys'])->name('countys');
    Route::get('/especialidades-medicas/{area_id}', [ManagementController::class, 'specialties'])->name('specialties');
    Route::get('/especialidades', [ManagementController::class, 'show_specialties'])->name('show_specialties');
    Route::get('/dados-clinicos', [ManagementController::class, 'clinical_datas'])->middleware('unit_access')->name('clinical_datas');
    Route::post('/adicionar-dados-clinicos', [ManagementController::class, 'register_clinical_datas'])->middleware('unit_access')->name('register_clinical_datas');
    Route::post('/adicionar-especialidade', [ManagementController::class, 'register_specialtie'])->name('register_specialtie');
    Route::post('/editar-especialidade/{specialtie_id}', [ManagementController::class, 'edit_specialtie'])->name('edit_specialtie');

    Route::get('/areas-medicas', [ManagementController::class, 'show_medical_area'])->name('show_medical_area');
    Route::post('/adicionar-area-medica', [ManagementController::class, 'register_medical_area'])->name('register_medical_area');
    Route::post('/editar-area-medica/{area_id}', [ManagementController::class, 'edit_medical_area'])->name('edit_medical_area');
    Route::post('/eliminar-area-medica/{area_id}', [ManagementController::class, 'delete_medical_area'])->name('delete_medical_area');

    Route::post('/eliminar-unidade-sanitaria/{health_unit_id}', [ManagementController::class, 'delete_health_unit'])->name('drop_health_unit');
    Route::post('/eliminar-especialidade/{specialtie_id}', [ManagementController::class, 'delete_specialtie'])->name('delete_specialtie');
    Route::post('/eliminar-noticia/{news_id}', [ManagementController::class, 'delete_news'])->name('drop_news');

});

