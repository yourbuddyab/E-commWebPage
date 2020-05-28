<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('quantity');
            $table->string('price');
            $table->longText('description');
            $table->string('pic1');
            $table->string('pic2');
            $table->string('pic3');
            $table->string('pic4');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('produects');
    }
}
