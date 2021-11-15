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
            $table->foreignId('car_class_id')->constrained();
            $table->string('kpp', 50);
            $table->unsignedInteger('year');
            $table->string('color', 50);
            $table->foreignId('car_body_id')->constrained();
            $table->foreignId('car_engine_id')->constrained();
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
