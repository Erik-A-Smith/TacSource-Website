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
        Schema::create('ranks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('rank')->unique();
            $table->integer('points')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('privileges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('rank')->unsigned()->nullable();
            $table->integer('base_rank')->unsigned()->nullable();
            $table->integer('privilege')->unsigned()->nullable();

            $table->foreign('base_rank')
              ->references('id')
              ->on('ranks')
      				->onDelete('set null')
      				->onUpdate('cascade');

            $table->foreign('rank')
              ->references('id')
              ->on('ranks')
      				->onDelete('set null')
      				->onUpdate('cascade');

            $table->foreign('privilege')
              ->references('id')
              ->on('privileges')
      				->onDelete('set null')
      				->onUpdate('cascade');
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
        Schema::dropIfExists('privileges');
        Schema::dropIfExists('ranks');
    }
}
