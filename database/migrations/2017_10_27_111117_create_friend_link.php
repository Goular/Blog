<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_links', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->increments('id');
            $table->string("name")->default('')->comment("名称");
            $table->string("title")->default('')->comment("标题");
            $table->string("url")->default('')->comment("链接");
            $table->integer("order")->default(0)->comment("排序");
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
        Schema::dropIfExists('friend_links');
    }
}
