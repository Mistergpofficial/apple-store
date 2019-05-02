<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->text('bigimage1');
            $table->string('musicid1');
            $table->string('musicid2');
            $table->string('catid1');
            $table->string('label');
            $table->string('imname1');
            $table->string('imartist1');
            $table->date('release_date');
            $table->string('version');
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
        Schema::dropIfExists('paid_apps');
    }
}
