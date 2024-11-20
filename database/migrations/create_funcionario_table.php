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
    Schema::create('funcionario', function (Blueprint $table) {
        $table->id();
        $table->string('nome', 100);
        $table->string('cargo', 50);
        $table->string('email', 50)->unique();
        $table->string('password');
        $table->enum('perfil_acesso', ['socio', 'funcionario']);
        $table->rememberToken();  // Adicionando a coluna remember_token
        $table->timestamps();  // Adicionando timestamps (caso não tenha)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
