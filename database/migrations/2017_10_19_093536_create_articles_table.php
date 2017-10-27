<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string("title")->unique()->comment("文章标题");
            $table->string("tag")->nullable()->comment("关键词");
            $table->string("description")->nullable()->comment("文章描述");
            $table->string("thumb")->nullable()->comment("文章缩略图");
            $table->text("content")->nullable()->comment("文章正文");
            $table->string("editor")->nullable()->comment("作者");
            $table->integer("view")->nullable()->default(0)->comment("查看次数");
            $table->integer("cate_id")->nullable()->default(0)->comment("标题");
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
        Schema::dropIfExists('articles');
    }
}
