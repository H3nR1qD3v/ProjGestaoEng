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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('cpf', 11)->unique();
            $table->date('data_nascimento');
            $table->string('telefone', 11)->unique();
            $table->integer('numero_residencia');
            $table->string('rua', 100);
            $table->string('bairro', length: 100);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->string('cep', 8);
            $table->string('complemento', 20);
            $table->date('data_cadastro');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
