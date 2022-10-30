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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('decricao', 30);
            $table->timestamps();

        
        });

            // adicionar o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        
        // RELACIONAMENTOS NECESSÁRIOS (vamos usar a mesma migration)
        // adicionar o relacionamento com a tabela produtos_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* DESFAZENDO TUDO FEITO NO MÉTODO UP */
        // REMOVENDO AS CHAVES ESTRANGEIRAS
        // adicionar o relacionamento com a tabela produtos_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            // remover a forekey(fk)
            $table->dropForeign('produto_detalhes_unidade_id_foreign');   // [table]_[coluna]_foreign ->verificar o nome criado na tablela
            
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');
            
        });
        
       
        // remover o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            // remover a forekey(fk)
            $table->dropForeign('produtos_unidade_id_foreign');   // [table]_[coluna]_foreign ->verificar o nome criado na tablela
            
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');
            
        });

        Schema::dropIfExists('unidades');
    }
};
