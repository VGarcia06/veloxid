<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_evaluations', function (Blueprint $table) {
            $table->id();
            $table->boolean('valor');

            // foreign keys
            $table->foreignId('vehicle_revision_id');
            $table->foreignId('vehicle_requirement_id');

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
        Schema::dropIfExists('vehicle_evaluations');
    }
}
