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
        $name = 'name'; // The current name of the column
        $username = 'username'; // The new name of the column
        DB::statement('ALTER TABLE users CHANGE name username VARCHAR(255)');
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->default(' ');
            $table->date('birthday')->default('1990-01-01');
            $table->string('about_me')->default('I have no biography.');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('birthday');
            $table->dropColumn('about_me');
        });
    }
};
