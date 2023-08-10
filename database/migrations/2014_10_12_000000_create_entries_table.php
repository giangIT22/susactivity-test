<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('isEntered')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('parentmeber_id')->nullable();
            $table->integer('masionMaster_id')->nullable();
            $table->string('room_name');
            $table->integer('building_id')->nullable();
            $table->string('representative_lastname');
            $table->string('representative_firstname');
            $table->date('representative_birthdate');
            $table->integer('resident_id')->nullable();
            $table->integer('child_resident_id')->nullable();
            $table->tinyInteger('usage_classification_id')->nullable();
            $table->string('delivery_email');
            $table->tinyInteger('is_delivery_info_equal_to_entry_info');
            $table->string('delivery_name');
            $table->string('delivery_zip');
            $table->string('delivery_address');
            $table->string('delivery_tell');
            $table->integer('energyvender_id')->nullable();
            $table->dateTime('usage_from_date');
            $table->dateTime('last_login_date');
            $table->string('update_acount')->nullable();
            $table->string('delete_acount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
