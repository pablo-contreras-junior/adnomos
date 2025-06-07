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
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('assunto')->default('não informado');
            $table->string('polo_ativo')->default('não disponivel');
            $table->foreignId('user_id')->onDelete('cascade')->constrained();
            $table->date('prazo')->nullable();
            $table->string('numero_processo')->nullable();
            $table->string('tribunal')->nullable();
            $table->string('orgaoJulgador')->nullable();
            $table->boolean('encerrado')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('casos');
    }
};
