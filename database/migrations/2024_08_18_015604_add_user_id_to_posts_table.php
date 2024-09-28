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
        Schema::table('posts', function (Blueprint $table) {
            // Check if the user_id column does not already exist
            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->bigInteger('user_id')->unsigned()->nullable()->after('content');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Only drop the column if it exists
            if (Schema::hasColumn('posts', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }
};
