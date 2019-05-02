<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopPaidAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_paid_apps', function (Blueprint $table) {
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
            $table->string('summary');
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
        Schema::dropIfExists('top_paid_apps');
    }
}
