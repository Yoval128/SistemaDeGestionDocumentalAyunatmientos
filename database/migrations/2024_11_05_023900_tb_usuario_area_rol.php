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
        Schema::create('tb_usuario_area_rol', function (Blueprint $table) {
            $table->bigIncrements('id_usuario_area_rol');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_rol');
            $table->timestamp('fecha_asignacion');
        
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_usuario_area_rol');
    }
};
