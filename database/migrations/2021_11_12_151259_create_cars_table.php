<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25)->unique();
            $table->text('body');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('old_price')->nullable(true);
            $table->string('salon', 50);
            $table->foreignId('car_class_id')->nullable(true)->constrained();
            $table->string('kpp', 50)->nullable(true);
            $table->dateTime('year');
            $table->string('color', 50)->nullable(true);
            $table->foreignId('car_body_id')->nullable(true)->constrained();
            $table->foreignId('car_engine_id')->nullable(true)->constrained();
            $table->boolean('is_new')->default(false);
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
        Schema::dropIfExists('cars');
    }
}
