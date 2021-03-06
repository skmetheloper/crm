<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
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
            $table->text('name');
            $table->text('code');
            $table->integer('category_id');
            $table->integer('unit');
            $table->float('unit_price');
            $table->text('currency');
            $table->float('total_price');
            $table->integer('owner_id');
            $table->integer('visible_to');
            $table->boolean('active_flag');
            $table->text('description');
            $table->integer('tax');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('products');
    }
}
