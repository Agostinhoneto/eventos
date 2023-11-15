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
        Schema::create('assentos_reservas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_comprador');
            $table->string('cpf_comprador');
            $table->string('email_comprador');
            $table->string('valor_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('assentos_reservas');
    }
};
