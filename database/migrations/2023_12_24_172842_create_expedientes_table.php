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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('n_expediente');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('delito');
            $table->date('fecha_sentencia');
            $table->string('pena');
            $table->date('fecha_ingreso');
            $table->text('observaciones')->nullable();
            $table->text('penas_accesorias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
