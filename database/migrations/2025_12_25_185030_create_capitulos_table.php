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
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100)-> unique;
            $table->string('personagens', 250);
            $table->text("ideia_principal");
            $table->integer('numero_paragrafos'); 
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            $table->longText('resumo_gerado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitulos');
    }
};
