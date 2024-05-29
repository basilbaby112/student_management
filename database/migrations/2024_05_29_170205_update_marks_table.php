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
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn('marks');
            $table->integer('maths')->after('subject')->nullable();
            $table->integer('science')->after('maths')->nullable();
            $table->integer('history')->after('science')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn(['maths', 'science', 'history']);
            $table->integer('marks');
        });
    }
};
