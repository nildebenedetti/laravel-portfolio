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
            $table->renameColumn('tech stack', 'tech_stack');
            $table->renameColumn('github link', 'github_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('tech_stack', 'tech stack');
            $table->renameColumn('github_link', 'github link');
        });
    }
};
