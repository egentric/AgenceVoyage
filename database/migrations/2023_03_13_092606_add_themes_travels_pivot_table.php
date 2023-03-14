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
        Schema::create('theme_travel', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('theme_id')->unsigned();
            $table->foreign('theme_id')
                ->references('id')
                ->on('themes')
                ->onDelete('cascade');

            $table->bigInteger('travel_id')->unsigned();
            $table->foreign('travel_id')
                ->references('id')
                ->on('travels')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('theme_travel', function (Blueprint $table) {
            $table->dropColumn('theme_id');
            $table->dropColumn('travel_id');
        });
    }
};
