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
        Schema::create('types_travels', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('idType')->unsigned();
            $table->foreign('idType')
                ->references('id')
                ->on('types');

            $table->bigInteger('idTravel')->unsigned();
            $table->foreign('idTravel')
                ->references('id')
                ->on('travels');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('types_travels', function (Blueprint $table) {
            $table->dropColumn('idType');
            $table->dropColumn('idTravel');
        });
    }
};
