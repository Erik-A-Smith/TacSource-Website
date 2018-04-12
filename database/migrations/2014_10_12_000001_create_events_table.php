<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('statuses', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
        $table->softDeletes();
      });

        Schema::create('roles', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name');
          $table->integer('points')->unsigned()->nullable();
          $table->timestamps();
          $table->softDeletes();
        });

        Schema::create('event_types', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name');
          $table->integer('points')->unsigned()->nullable();
          $table->timestamps();
          $table->softDeletes();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('owner')->unsigned()->nullable();
            $table->integer('type')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->text('name');
            $table->string('time')->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('zone')->nullable();
            $table->text('mods')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner')
              ->references('id')
              ->on('users')
      				->onDelete('set null')
      				->onUpdate('cascade');

            $table->foreign('status')
              ->references('id')
              ->on('statuses')
      				->onDelete('set null')
      				->onUpdate('cascade');

            $table->foreign('type')
              ->references('id')
              ->on('event_types')
      				->onDelete('set null')
      				->onUpdate('cascade');
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            // User
            $table->integer('attendee')->unsigned()->nullable();
            $table->foreign('attendee')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            // User
            $table->integer('role')->unsigned()->nullable();
            $table->foreign('role')
              ->references('id')
              ->on('roles')
              ->onDelete('set null')
              ->onUpdate('cascade');

            // Attendance
            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')
              ->references('id')
              ->on('events')
              ->onDelete('cascade')
              ->onUpdate('cascade');

            // Attendance
            $table->integer('status')->unsigned()->nullable();
            $table->foreign('status')
              ->references('id')
              ->on('statuses')
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
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_types');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('statuses');
    }
}
