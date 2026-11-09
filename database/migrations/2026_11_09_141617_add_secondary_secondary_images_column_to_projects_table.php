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
            $table->string('image_pt_1')->after('image')->nullable();
            $table->string('image_pt_2')->after('image_pt_1')->nullable();
            $table->string('image_pt_3')->after('image_pt_2')->nullable();
            $table->string('image_pt_4')->after('image_pt_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('image_pt_1');
            $table->dropColumn('image_pt_2');
            $table->dropColumn('image_pt_3');
            $table->dropColumn('image_pt_4');
        });
    }
};
