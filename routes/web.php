<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'index'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobrenosController::class, 'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');



Route::get('/login', function (){ return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function(){

    Route::get('/clientes', function (){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function (){ return 'Produtos'; })->name('app.produtos');

});

Route::get('/teste/{param1?}/{param2?}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function() {
    echo 'A Rota acessada não existe.  <a href=" ' .route('site.index').' "> clique aqui </a> para retornar';
  });

