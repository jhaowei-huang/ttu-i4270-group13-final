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
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            /*
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            */
            $table->string('user_id')->unique()->primary();
            // 必填欄位
            $table->string('username')->nullable(false)->unique();
            $table->string('email')->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->string('name')->nullable(false);
            // 選填欄位
            $table->string('address', 500)->nullable(true);
            $table->string('department')->nullable(true);
            $table->string('position')->nullable(true);
            $table->string('phone', 10)->nullable(true);
            $table->string('phone_ext', 10)->nullable(true);
            $table->string('fax', 10)->nullable(true);
            $table->string('fax_ext', 10)->nullable(true);
            // 驗證相關欄位
            $table->boolean('email_verified')->nullable(false)->default(0);
            $table->string('remember_token')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
