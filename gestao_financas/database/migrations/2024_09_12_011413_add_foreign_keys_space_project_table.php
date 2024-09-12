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
        Schema::table('space_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('responsible_user');
            $table->foreign('responsible_user')->references('id')->on('users');
            $table->unsignedBigInteger('recipe_status_id');
            $table->foreign('recipe_status_id')->references('id')->on('recipe_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('space_projects', function (Blueprint $table) {
            $table->dropForeign(['responsible_user']);
            $table->dropColumn('responsible_user');

            $table->dropForeign(['recipe_status_id']);
            $table->dropColumn('recipe_status_id');
        });
    }
};
