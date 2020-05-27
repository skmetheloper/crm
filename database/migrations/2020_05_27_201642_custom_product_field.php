<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomProductField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_product_field', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('field_type');
            $table->integer('detail_view');
            $table->integer('add_view');
            $table->integer('visible_to');
            $table->boolean('active_flag');
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
        Schema::dropIfExists('custom_product_field');
    }
}
