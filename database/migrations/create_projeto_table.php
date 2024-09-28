<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projeto', function (Blueprint $table) {
            $table->id();
            $table->string('descricao_projeto',100);
            $table->boolean('mcmv'); // MINHA CASA MINHA VIDA
            $table->double('tamanho');
            $table->date('data_inicial');
            $table->date('data_previsao');
            $table->double('valor');

            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_situacao');
            $table->unsignedBigInteger('id_tipo');

            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->foreign('id_situacao')->references('id')->on('situacao')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id')->on('tipoprojeto')->onDelete('cascade');

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projeto');
    }
};
