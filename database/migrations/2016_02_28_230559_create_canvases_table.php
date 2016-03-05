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
            $table->string('project_id');
            $table->text('key_partners');
            $table->text('key_activities');
            $table->text('key_resources');
            $table->text('value_propositions');
            $table->text('customer_relationships');
            $table->text('channels');
            $table->text('customer_segments');
            $table->text('cost_structure');
            $table->text('revenue_streams');
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
        Schema::drop('canvases');
    }
}
