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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');

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
        Schema::dropIfExists('pictures');
        Schema::table('pictures', function (Blueprint $table) { 
            $table->dropColumn('idTravel');
        });
    }
};
