<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('alto')->nullable();
            $table->string('ancho')->nullable();
            $table->string('largo')->nullable();
            $table->double('precio_unitario')->nullable();
            $table->integer('cantidad')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('imagen')->nullable();

            // foreign keys
            $table->foreignId('subcategory_id');
            $table->foreignId('service_id');

            // timestamps
            $table->timestamps();

            // softdelets
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
        Schema::dropIfExists('products');
    }
}
