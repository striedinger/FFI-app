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
            $table->integer('company_id');
            for($i=1;$i<=115;$i++){
                $name = 'p' . $i;
                $table->string($name, 100)->nullable();
            }
            $table->boolean('active')->default(true);
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
        Schema::drop('icais');
    }
}
