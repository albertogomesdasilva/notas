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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            // Colunas
            $table->id();

            $table->unsignedBigInteger('produto_id'); // Por convensão usamos o singular do nome da tabela que envia a chave e o nome da coluna

            $table-> float('comprimento', 8, 2);
            $table-> float('largura', 8, 2);
            $table-> float('altura', 8, 2);

            $table->timestamps();

            // Constraint de de integridade referencial
            $table->foreign('produto_id')->references('id')->on('produtos');
            // Constraint para garantir que não tenha valor repetido
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
