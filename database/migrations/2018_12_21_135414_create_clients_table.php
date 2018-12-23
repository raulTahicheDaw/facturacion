<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificacion_fiscal', 20);
            $table->string('nombre', 50);
            $table->string('nombre_comercial', 50)->nullable();
            $table->string('direccion', 150);
            $table->string('codigo_postal', 10)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('municipio', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('movil', 50)->nullable();
            $table->string('contacto', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('web', 50)->nullable();
            $table->string('banco', 50)->nullable();
            $table->string('cuenta_bancaria', 50)->nullable();
            $table->string('observaciones', 1000)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
