<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_name');
            $table->string('artist_id');
            $table->string('artist_name');
            $table->string('genre_title');
            $table->text('image');
            $table->string('geo_link');
            $table->date('release_date');
            $table->string('version');
            $table->string('content_advisory');
            $table->string('file_size_bytes');
            $table->string('genre_ids');
            $table->string('minimum_os_version');
            $table->string('seller_url');
            $table->string('average_user_rating');
            $table->string('user_rating_counting');
            $table->string('formatted_price');
            $table->text('description');
            $table->text('screenshots');
            $table->string('musicid');
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
        Schema::dropIfExists('individual_apps');
    }
}
