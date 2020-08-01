<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLouerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('louer', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('tracteur_id');
            $table->unsignedBigInteger('utilisateur_id');

            $table->foreign('tracteur_id')->references('id')->on('tracteurs')
                ->onDelete('cascade');
            $table->foreign('utilisateur_id')->references('id')->on('users')
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
        Schema::dropIfExists('louer');
    }
}
