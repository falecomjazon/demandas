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
        Schema::create('demandas', function (Blueprint $table) {
            $table->id();
            $table->integer('nu_prioridade')->nullable();
            $table->string('st_demanda');
            $table->string('st_modulo');
            $table->string('st_descricao')->nullable();
            $table->date('dt_inicio')->nullable();
            $table->date('dt_conclusao')->nullable();
            $table->timestamp('dt_cadastro')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandas');
    }
};
