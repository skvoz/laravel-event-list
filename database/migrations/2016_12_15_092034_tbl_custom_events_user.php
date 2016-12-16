<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomEventsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('custom_events_user')) {
            Schema::create('custom_events_user', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('custom_event_id')->unsigned()->index()->foreign()->references("id")->on("custom_events")->onDelete("cascade");
                $table->integer('user_id')->unsigned()->index()->foreign()->references("id")->on("users")->onDelete("cascade");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_events_user');
    }
}
