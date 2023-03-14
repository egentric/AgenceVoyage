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

            $table->bigInteger('departCity')->unsigned();
            $table->foreign('departCity')
                ->references('id')
                ->on('cities');

            
                $table->bigInteger('destinationCity')->unsigned();
                $table->foreign('destinationCity')
                    ->references('id')
                    ->on('cities');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) { 
            $table->dropColumn('departCity');
            $table->dropColumn('destinationCity');
        });
    }
};
