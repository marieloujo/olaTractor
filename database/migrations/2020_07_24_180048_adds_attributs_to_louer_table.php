<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsAttributsToLouerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('louer', function (Blueprint $table) {
            $table->boolean('is_paie')->after('utilisateur_id')->default('0');
            $table->boolean('is_valid')->after('is_paie')->default('0');
            $table->boolean('date_emprunt')->nullable();
            $table->boolean('date_retour')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('louer', function (Blueprint $table) {
            //
        });
    }
}
