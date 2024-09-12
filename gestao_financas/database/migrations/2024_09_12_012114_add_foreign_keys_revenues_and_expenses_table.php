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
        Schema::table('revenues_and_expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('space_project_id');
            $table->foreign('space_project_id')->references('id')->on('space_projects');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_revenues_and_expenses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revenues_and_expenses', function (Blueprint $table) {
            $table->dropForeign(['space_project_id']);
            $table->dropColumn('space_project_id');

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
