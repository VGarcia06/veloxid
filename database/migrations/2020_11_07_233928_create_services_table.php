<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('direccion_origen');
            $table->string('direccion_destino');
            $table->dateTime('fecha_recojo')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->double('total')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();

            // foreign keys
            $table->foreignId('distrito_origen_id');
            $table->foreignId('distrito_destino_id');
            $table->foreignId('user_id');
            $table->foreignId('service_state_id');

            // timestamps
            $table->timestamps();

            // softdelete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
