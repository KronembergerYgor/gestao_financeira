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
        Schema::table('category_revenues_and_expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('revenues_and_expenses_id');
            $table->foreign('revenues_and_expenses_id')->references('id')->on('revenues_and_expenses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_revenues_and_expenses', function (Blueprint $table) {
            $table->dropForeign(['revenues_and_expenses_id']);
            $table->dropColumn('revenues_and_expenses_id');
        });
    }
};
