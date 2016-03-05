<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('p1')->nullable();
            $table->integer('p2')->nullable();
            $table->integer('p3')->nullable();
            $table->integer('p4')->nullable();
            $table->integer('p5')->nullable();
            $table->integer('p6')->nullable();
            $table->integer('p7')->nullable();
            $table->integer('p8')->nullable();
            $table->integer('p9')->nullable();
            $table->integer('p10')->nullable();
            $table->integer('p11')->nullable();
            $table->integer('p12')->nullable();
            $table->integer('p13')->nullable();
            $table->integer('p14')->nullable();
            $table->integer('p15')->nullable();
            $table->integer('p16')->nullable();
            $table->integer('p17')->nullable();
            $table->integer('p18')->nullable();
            $table->integer('p19')->nullable();
            $table->integer('p20')->nullable();
            $table->boolean('finished')->default(false);
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
        Schema::drop('imis');
    }
}
