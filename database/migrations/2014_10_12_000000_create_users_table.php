<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id')->comment('用户ID');
            $table->string('username')->unique()->comment('用户名');
            $table->string('email')->unique()->comment('电子邮箱');
            $table->string('nickname')->comment('昵称');
            $table->char('mobile', 11)->comment('手机号码');
            $table->string('password')->comment('用户密码');
            $table->enum('sex', ['男', '女', '保密'])->comment('性别');
            $table->rememberToken();
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
        Schema::dropIfExists('admin_users');
    }
}
