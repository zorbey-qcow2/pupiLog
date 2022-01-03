<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagepushesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagepushes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->morphs('imagepushable');
            $table->string('file_location');
            $table->text('excerpt');
            $table->bigInteger('view_count');
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
        Schema::dropIfExists('imagepushes');
    }
}
