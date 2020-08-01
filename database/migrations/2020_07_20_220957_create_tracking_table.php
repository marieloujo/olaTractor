<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('tracteur_id');
            $table->foreign('tracteur_id')->references('id')->on('tracteurs')
                ->onDelete('cascade');

            $table->string('longitude');
            $table->string('latitude');

            $table->date('date');	
            $table->time('time', 0);

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
        Schema::dropIfExists('tracking');
    }
}
