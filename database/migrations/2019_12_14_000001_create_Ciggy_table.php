<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciggies', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('type');
            $table->decimal('price');
            $table->bigInteger('amount');
        //    $table->string('Ciggy_image');
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
        Schema::dropIfExists('ciggies');
    }
};
