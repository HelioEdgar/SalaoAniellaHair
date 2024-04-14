<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FuncController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SalaoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ContactoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','perfil:administrador'])->group(function(){
 Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

 Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

 Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

 Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

 Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

 Route::post('/admin/criar/func', [AdminController::class, 'CriarFunc'])->name('admin.criar.func');

 Route::get('/admin/criar/funcionario', [AdminController::class, 'ViewFunc'])->name('func.criar');
});

Route::middleware(['auth','perfil:funcionario'])->group(function(){
  Route::get('/func/dashboard', [FuncController::class, 'FuncDashboard'])->name('func.dashboard');

  Route::get('/func/logout', [FuncController::class, 'FuncLogout'])->name('func.logout');

  Route::get('/func/profile', [FuncController::class, 'FuncProfile'])->name('func.profile');
 
  Route::post('/func/profile/store', [FuncController::class, 'FuncProfileStore'])->name('func.profile.store');
 
  Route::get('/func/change/password', [FuncController::class, 'FuncChangePassword'])->name('func.change.password');
 
  Route::post('/func/update/password', [FuncController::class, 'FuncUpdatePassword'])->name('func.update.password');

  Route::get('/func/agendamento', [FuncController::class, 'FuncAgendamento'])->name('func.agendamento');
});


Route::middleware(['auth','perfil:utilizador'])->group(function(){
    Route::get('/utilizador/dashboard', [UtilizadorController::class, 'UtilizadorDashboard'])->name('utilizador.dashboard');
   
    Route::get('/utilizador/logout', [UtilizadorController::class, 'UtilizadorLogout'])->name('utilizador.logout');
   
    Route::get('/utilizador/profile', [UtilizadorController::class, 'UtilizadorProfile'])->name('utilizador.profile');
   
    Route::post('/utilizador/profile/store', [UtilizadorController::class, 'UtilizadorProfileStore'])->name('utilizador.profile.store');
   
    Route::get('/utilizador/change/password', [UtilizadorController::class, 'UtilizadorChangePassword'])->name('utilizador.change.password');
   
    Route::post('/utilizador/update/password', [UtilizadorController::class, 'UtilizadorUpdatePassword'])->name('utilizador.update.password');

    Route::post('/utilizador/update/foto', [UtilizadorController::class, 'UtilizadorUpdateFoto'])->name('utilizador.update.foto');
    
});

   Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

   Route::get('/func/login', [FuncController::class, 'FuncLogin'])->name('func.login');

   Route::get('/utilizador/login', [UtilizadorController::class, 'UtilizadorLogin'])->name('utilizador.login');



Route::middleware(['auth','perfil:administrador'])->group(function(){

    Route::controller(ServicoController::class)->group(function(){
        Route::get('/lista/servico', 'ListaServico')->name('lista.servico');
        Route::get('/adicionar/servico', 'AdicionarServico')->name('adicionar.servico');
        Route::post('/guardar/servico', 'GuardarServico')->name('guardar.servico');
        Route::get('/editar/servico/{id}', 'EditarServico')->name('editar.servico');
        Route::post('/actualizar/servico', 'ActualizarServico')->name('actualizar.servico');
        Route::get('/apagar/servico/{id}', 'ApagarServico')->name('apagar.servico');

        Route::get('/servicos/{id}/ativar', 'ativar')->name('servicos.ativar');
        Route::get('/servicos/{id}/desativar', 'desativar')->name('servicos.desativar');

    });

    Route::get('/utilizador/delete/{id}', [UtilizadorController::class, 'ApagarConta'])->name('apagar.cliente');
    Route::get('/func/delete/{id}', [FuncController::class, 'ApagarConta'])->name('apagar.func');

    Route::get('/perfil/{id}/ativar', [UtilizadorController::class, 'ativar'])->name('perfil.ativar');
    Route::get('/perfil/{id}/desativar', [UtilizadorController::class, 'desativar'])->name('perfil.desativar');

    Route::get('/perfilF/{id}/ativar', [FuncController::class, 'ativarF'])->name('perfilF.ativar');
    Route::get('/perfilF/{id}/desativar', [FuncController::class, 'desativarF'])->name('perfilF.desativar');

    Route::controller(SalaoController::class)->group(function(){
        Route::get('/lista/salao', 'ListaSalao')->name('lista.salao');
        Route::get('/adicionar/salao', 'AdicionarSalao')->name('adicionar.salao');
        Route::post('/guardar/salao', 'GuardarSalao')->name('guardar.salao');
        Route::get('/editar/salao/{id}', 'EditarSalao')->name('editar.salao');
        Route::post('/actualizar/salao', 'ActualizarSalao')->name('actualizar.salao');
        Route::get('/apagar/salao/{id}', 'ApagarSalao')->name('apagar.salao');
    });

    Route::controller(GaleriaController::class)->group(function(){
        Route::get('/lista/galeria', 'ListaGaleria')->name('lista.galeria');
        Route::get('/adicionar/galeria', 'AdicionarGaleria')->name('adicionar.galeria');
        Route::post('/guardar/galeria', 'GuardarGaleria')->name('guardar.galeria');
        Route::get('/editar/galeria/{id}', 'EditarGaleria')->name('editar.galeria');
        Route::post('/actualizar/galeria', 'ActualizarGaleria')->name('actualizar.galeria');
        Route::get('/apagar/galeria/{id}', 'ApagarGaleria')->name('apagar.galeria');
    });

    Route::controller(HorarioController::class)->group(function(){
        Route::get('/lista/horario', 'ListaHorario')->name('lista.horario');
        Route::get('/adicionar/horario', 'AdicionarHorario')->name('adicionar.horario');
        Route::post('/guardar/horario', 'GuardarHorario')->name('guardar.horario');
        Route::get('/editar/horario/{id}', 'EditarHorario')->name('editar.horario');
        Route::post('/actualizar/horario', 'ActualizarHorario')->name('actualizar.horario');
        Route::get('/apagar/horario/{id}', 'ApagarHorario')->name('apagar.horario');
    });

});

Route::resource('aniellahair', SiteController::class);

Route::get('/salao', [SiteController::class, 'index'])->name('site.index');

Route::get('/servico/{slug}', [SiteController::class, 'detalhes'])->name('detalhes.servico');

Route::get('/lista/funcionario', [FuncController::class, 'ListaFuncionario'])->name('lista.funcionario');

Route::get('/lista/cliente', [UtilizadorController::class, 'ListaCliente'])->name('lista.cliente');

Route::get('/cliente/profile/{id}', [UtilizadorController::class, 'ClienteProfile'])->name('cliente.profile');

Route::get('/funcionario/profile/{id}', [FuncController::class, 'FuncionarioProfile'])->name('funcionario.profile');

Route::post('/guardar/agendamento', [AgendamentoController::class, 'AgendamentoGuardar'])->name('guardar.agendamento');

//Route::get('/horarios-disponiveis', [AgendamentoController::class, 'getHorariosDisponiveis'])->name('cliente.getHorariosDisponiveis');

Route::post('/agendar', [AgendamentoController::class, 'criarAgendamento'])->name('agendar');

Route::get('/buscar-horarios/{diaDaSemana}', [AgendamentoController::class, 'buscarHorarios']);

Route::controller(AgendamentoController::class)->group(function(){
    Route::get('/lista/agendamento', 'ListaAgendamento')->name('lista.agendamento');
    // Route::get('/adicionar/horario', 'AdicionarHorario')->name('adicionar.horario');
    // Route::post('/guardar/horario', 'GuardarHorario')->name('guardar.horario');
    Route::get('/editar/agendamento/{id}', 'EditarAgendamento')->name('editar.agendamento');
    Route::get('/concluir/agendamento/{id}', 'ConcluirAgendamento')->name('concluir.agendamento');
    // Route::post('/actualizar/horario', 'ActualizarHorario')->name('actualizar.horario');
    // Route::get('/apagar/horario/{id}', 'ApagarHorario')->name('apagar.horario');
});

Route::post('/send', [ContactoController::class, 'send'])->name('send.email');