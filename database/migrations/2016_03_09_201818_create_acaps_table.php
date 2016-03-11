<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            for($i=1;$i<=44;$i++){
                $name = 'p' . $i;
                $table->integer($name)->nullable();
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
        Schema::drop('acaps');
    }
}
