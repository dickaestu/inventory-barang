<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_list_id');
            $table->string('name');
            $table->string('phone_number',13);
            $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('product_list_id')->references('id')->on('product_lists')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lists');
    }
}
