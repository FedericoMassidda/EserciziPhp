<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) 
        {
            $table->string('youtube_link')->nullable(); // Aggiungi una colonna per il link di YouTube
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) 
        {
            $table->dropColumn('youtube_link'); // Rimuovi la colonna se necessario
        });
    }
};
