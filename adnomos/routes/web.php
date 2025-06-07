<?php


use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OABController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PeticaoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\VerificarPrazos;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TarefaController;

# Rotas Publicas
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.post');


# Cadastro
Route::get('/cadastro',[CadastroController::class,'stepOne'])->name('stepOne.get');
Route::post('/cadastro',[CadastroController::class,'stepOnePost'])->name('stepOne.post');

Route::get('cadastro/next',[CadastroController::class,'stepTwo'])->name('stepTwo.get');
Route::post('cadastro/next',[CadastroController::class,'stepTwoPost'])->name('stepTwo.post');

Route::post('cadastro/fisica/finish',[CadastroController::class,'stepTwoPostFisica'])->name('finishFisica.post');
Route::post('cadastro/juridica/finish',[CadastroController::class,'stepTwoPostJuridica'])->name('finishJuridica.post');




#Rotas Protegidas
Route::middleware('auth')->group(function(){

    #dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('logout',[LogoutController::class,'logout'])->name('logout');

    #caso
    Route::get('casos',[CasoController::class,'index'])->name('casos');
    Route::get('casos/detalhes/{idCaso}',[CasoController::class,'mostrarDetalhes'])->name('casos.detalhes');
    Route::get('casos/download/documento/{idDocumento}',[CasoController::class,'download'])->name('casos.download');
        #criar proprio caso
        Route::get('casos/add',[CasoController::class,'add'])->name('caso.add');
        Route::post('casos/save',[CasoController::class,'save'])->name('caso.save');
    Route::post('casos/criar',[CasoController::class,'searchCase'])->name('casos.criar');
    Route::post('casos/upload/documento/{idCaso}',[CasoController::class,'upload'])->name('casos.upload');
    Route::post('casos/criar/comentario/{idCaso}',[CasoController::class,'criarComentario'])->name('casos.comentar');
    Route::post('caso/adicionar/prazo/{idCaso}',[CasoController::class,'addPrazo'])->name('casos.prazo');

    #notificações
    Route::get('notificacoes',[NotificationController::class,'index'])->name('notificacoes');
    Route::post('notificacoes/ler/{id}',[NotificationController::class,'ler'])->name('notificacoes.ler');

    #tarefas
    Route::get('tarefas',[TarefaController::class,'index'])->name('tarefas');
    Route::post('tarefas/criar',[TarefaController::class,'store'])->name('tarefas.criar');
    Route::post('tarefa/concluir/{id}',[TarefaController::class,'concluir'])->name('tarefa.concluir');

    #perfil
    Route::get('perfil',[PerfilController::class,'index'])->name('perfil');
    Route::put('perfil/atualizar',[PerfilController::class,'atualizar'])->name('perfil.atualizar');

    #calendário
    Route::get('calendario',[CalendarioController::class,'index'])->name('calendario');
    Route::get('calendario/casos',[CalendarioController::class,'casos'])->name('calendario.casos');

    # Pegar OAB
    Route::get('cadastro/oab',[OABController::class,'index'])->name('cadastroOAB.get');
    Route::post('cadastro/oab',[OABController::class,'store'])->name('cadastroOAB.post');
    
    # Salvar Processos
    Route::get('casos/buscar-e-salvar',[CasoController::class,'buscarComAPI'])->name('salvarCasos.get');

    #modelos
    Route::get('peticao-inicial',[PeticaoController::class,'index'])->name('peticao');
    Route::post('peticao-inicial/gerar',[PeticaoController::class,'gerar'])->name('peticao.gerar');

    
});

