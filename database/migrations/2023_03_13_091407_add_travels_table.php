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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('intro');
            $table->text('description');
            $table->string('duration');
            $table->string('price');

            $table->bigInteger('idCity')->unsigned();
            $table->foreign('idCity')
                ->references('id')
                ->on('cities');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) { 
            $table->dropColumn('idCity');
        });
    }
};
