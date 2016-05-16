<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canvases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->text('key_partners');
            $table->text('key_activities');
            $table->text('key_resources');
            $table->text('value_propositions');
            $table->text('customer_relationships');
            $table->text('channels');
            $table->text('customer_segments');
            $table->text('cost_structure');
            $table->text('revenue_streams');
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
        Schema::drop('canvases');
        DB::statement('SET foreign_key_checks = 1');
    }
}
