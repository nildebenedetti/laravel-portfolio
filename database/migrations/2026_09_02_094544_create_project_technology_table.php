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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();
            // we need to add foreign ids only!!!
            // constrained() automatically infers the referenced 
            // table ('technologies') by pluralizing the 'technology'
            // prefix and targeting its 'id' column.
            $table->foreignId('project_id')->constrained();
            $table->foreignId('technology_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
