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
        /*
        Añadir un modelo Tarea, las tareas deben tener título, descripción y fecha de vencimiento.
        Tendrá una relación 1 a muchos, pudiendo un usuario tener 0 o más tareas y una tarea pertenecerá a un único usuario.
        */
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('vencimiento');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
