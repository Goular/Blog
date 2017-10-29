<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")->default('')->comment("标题");
            $table->string("name")->default('')->comment("变量名");
            $table->string("content")->default('')->comment("变量值");
            $table->integer("order")->default(0)->comment("排序");
            $table->string("tips")->default('')->comment("描述");
            $table->string("type")->default('')->comment("字段类型");
            $table->string("value")->default('')->comment("类型值");
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
        Schema::dropIfExists('web_config');
    }
}
