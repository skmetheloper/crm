<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class People extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id('people_id');
            $table->integer('organization_id');
            $table->integer('label_id');
            $table->integer('phoneDetails_id');
            $table->integer('emailDetails_id');
            $table->integer('owner_id');
            $table->integer('id');
            $table->integer('activities_to_do');
            $table->integer('closed_deals');
            $table->integer('done_activities');
            $table->integer('email_messages_count');
            $table->dateTime('last_activity_date');
            $table->integer('lost_deals');
            $table->dateTime('next_activity_date');
            $table->integer('open_deals');
            $table->dateTime('person_created_at');
            $table->binary('profile_pic');
            $table->integer('total_activities');
            $table->dateTime('update_time');
            $table->integer('visible_to');
            $table->integer('won_deals');
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
        Schema::dropIfExists('people');
    }
}
