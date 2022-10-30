<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CRIANDO NOVA COLUNAS NA TABELA
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // PARA REMOVER AS COLUNAS CRIADA NO MÉTODO UP
        Schema::table('fornecedores', function (Blueprint $table) {
           // $table->$table->dropColumn('uf');
           // $table->dropColumn('email'); ou podemos usar apenas o comando abaixo passando um array de colunas
            $table->dropColumn(['uf', 'email']);
        });
    }
};
