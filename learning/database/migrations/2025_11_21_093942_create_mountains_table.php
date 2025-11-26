<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->uuid("mountain_id")->primary();
            $table->string("mountain_name");
            $table->integer("mountain_height");
            $table->boolean("mountain_belongs_to_range");
            $table->date("mountain_first_climb_date");
            $table->enum("mountain_continent", ['Africa', 'Antarctica', 'Asia', 'Europe', 'North America', 'Oceania', 'South America']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mountains');
    }
};
