<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Organization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id('organization_id');
            $table->text('organization_name');
            $table->text('organization_address');
            $table->integer('label_id');
            $table->integer('owner_id');
            $table->integer('activities_to_do');
            $table->integer('closed_deals');
            $table->integer('done_activities');
            $table->dateTime('last_activity_date');
            $table->integer('lost_deals');
            $table->dateTime('next_activity_date');
            $table->integer('open_deals');
            $table->dateTime('organization_created_at');
            $table->integer('total_activities');
            $table->dateTime('update_time');
            $table->integer('won_deals');
            $table->binary('profile_picture');
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
        Schema::dropIfExists('organization');
    }
}
