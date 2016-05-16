<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            for($i=1;$i<=115;$i++){
                $name = 'p' . $i;
                $table->string($name, 100)->nullable();
            }
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::drop('icais');
        DB::statement('SET foreign_key_checks = 1');
    }
}
