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
        Schema::create('askeds', function (Blueprint $table) {
            $table->id();
            $table->integer('numberPeople');
            $table->string('status');

            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->bigInteger('idTravel')->unsigned();
            $table->foreign('idTravel')
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
        Schema::table('askeds', function (Blueprint $table) {
            $table->dropColumn('idUser');
            $table->dropColumn('idTravel');
        });
    }
};
