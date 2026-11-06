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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('stack_type');
            $table->string('frontend_github_link')->nullable()->after('github_link');
            $table->string('backend_github_link')->nullable()->after('frontend_github_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('stack_type')->default('full_stack');
            $table->dropColumn('frontend_github_link');
            $table->dropColumn('backend_github_link');
        });
    }
};
