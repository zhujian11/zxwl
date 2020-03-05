<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWlCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wl_carousel', function (Blueprint $table) {
            $table->increments('carousel_id');
            $table->string('carousel_img',100);
            $table->tinyInteger('carousel_status')->default(0)->comment('0:未启用,1:启用');
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
        Schema::dropIfExists('wl_carousel');
    }
}
