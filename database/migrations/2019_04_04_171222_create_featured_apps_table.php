<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artist_name');
            $table->string('track_name');
            $table->string('image');
            $table->string('track_id');
            $table->string('average_user_rating');
            $table->string('user_rating_counting');
            $table->string('genres');
            $table->date('release_date');
            $table->text('description');
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
        Schema::dropIfExists('featured_apps');
    }
}
