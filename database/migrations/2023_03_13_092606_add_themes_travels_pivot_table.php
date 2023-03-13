<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('themes_travels', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('idTheme')->unsigned();
            $table->foreign('idTheme')
                ->references('id')
                ->on('themes');

            $table->bigInteger('idTravel')->unsigned();
            $table->foreign('idTravel')
                ->references('id')
                ->on('travels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('themes_travels', function (Blueprint $table) { 
            $table->dropColumn('idTheme');
            $table->dropColumn('idTravel');
        });
    }
};
