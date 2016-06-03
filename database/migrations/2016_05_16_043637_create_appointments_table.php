<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('assistant_id')->unsigned()->nullable();
            $table->integer('consultation_time_id')->unsigned()->nullable();
            $table->text('user_comment')->nullable();
            $table->text('assistant_comment')->nullable();
            $table->string('status');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('assistant_id')->references('id')->on('users');
            $table->foreign('consultation_time_id')->references('id')->on('consultation_times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET foreign_key_checks = 0');
        Schema::drop('appointments');
        DB::statement('SET foreign_key_checks = 1');
    }
}
