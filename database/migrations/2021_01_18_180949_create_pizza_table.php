<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price')->default(0);
            $table->string('slug');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('ingredient_pizza', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('pizza_id');
            $table->foreign('pizza_id')
                    ->references('id')
                    ->on('pizzas')->onDelete('cascade');

            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
                  ->references('id')
                  ->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_pizza');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('pizzas');
    }
}
