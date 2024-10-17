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
        Schema::create('tb_historico', function (Blueprint $table) {
            $table->bigIncrements('id_historico'); /* -- Foránea que enlaza con el trámite del que proviene (si aplica) */
            $table->string('id_usuario_asigando'); 
            $table->string('id_tramite'); /* -- Tipo de documento (acta, resolución, etc.) */
            $table->string('tipo_documento'); /* -- Fecha en que fue creado el documento */
            $table->text('valor_historico'); /* -- Descripción del valor histórico del documento */
            $table->boolean('acceso_publico'); /*   -- Indica si el documento es de acceso público */
            $table->text('restricciones_acceso'); /*  -- Restricciones en el acceso (si aplica) */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_historico');
    }
};
