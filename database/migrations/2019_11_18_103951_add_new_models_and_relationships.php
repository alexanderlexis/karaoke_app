<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewModelsAndRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('artist_id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('video_id');
            $table->string('name');
            $table->integer('company_id');
            $table->timestamps();
        });

        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('song_id');
            $table->integer('artist_id');
            $table->integer('video_id');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('song_requests', function (Blueprint $table) {
            $table->bigIncrements('song_request_id');
            $table->string('singer');
            $table->integer('song_id');
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
        Schema::dropIfExists('artists');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('songs');
        Schema::dropIfExists('song_requests');
    }
}
