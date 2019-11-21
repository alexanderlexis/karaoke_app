<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePartsFromVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('part');
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->string('part')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('part')->default(null);
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('part');
        });
    }
}
