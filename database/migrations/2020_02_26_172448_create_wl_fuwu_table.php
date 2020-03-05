<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWlFuwuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wl_fuwu', function (Blueprint $table) {
            $table->uuid('fuwu_id')->primary();
            $table->string('fuwu_name',60)->unique();
            $table->string('fuwu_desc',250)->nullable();
            $table->string('fuwu_img',250)->nullable()->comment('产品封面');
            $table->text('fuwu_content')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('wl_fuwu');
    }
}
