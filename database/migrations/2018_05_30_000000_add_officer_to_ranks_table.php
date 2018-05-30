<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficerToRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('ranks', function (Blueprint $table) {
        $table->boolean('officer')->nullable();
      });

      Schema::create('audit_logs', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->integer('owner')->unsigned()->nullable();
          $table->string('type')->nullable();
          $table->string('text')->nullable();
          $table->softDeletes();
          $table->timestamps();

          $table->foreign('owner')
            ->references('id')
            ->on('users')
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
      Schema::dropIfExists('audit_logs');
    }
}
