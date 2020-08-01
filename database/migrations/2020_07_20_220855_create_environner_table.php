<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environner', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('localiteA_id');
            $table->unsignedBigInteger('localiteB_id');

            $table->foreign('localiteA_id')->references('id')->on('localites')
                ->onDelete('cascade');
            $table->foreign('localiteB_id')->references('id')->on('localites')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environner');
    }
}
