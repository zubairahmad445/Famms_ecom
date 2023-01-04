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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
             $table->string('title')->nullable();
              $table->text('des')->nullable();
               $table->string('image')->nullable();
             $table->unsignedBigInteger('category');
             $table->foreign('category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('price')->nullable();
             $table->string('dis_price')->nullable();
             $table->string('qty')->nullable();
           
           
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
        Schema::dropIfExists('products');
    }
};
