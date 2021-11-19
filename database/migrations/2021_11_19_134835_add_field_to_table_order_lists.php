<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTableOrderLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_lists', function (Blueprint $table) {
            $table->timestamp('approved_at')->nullable();
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_lists', function (Blueprint $table) {
            $table->dropColumn('approved_at');
            $table->dropColumn('quantity');
        });
    }
}
