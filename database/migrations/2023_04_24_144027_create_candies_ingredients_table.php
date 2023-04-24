<?php

use App\Models\Candy;
use App\Models\Ingredient;
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
        Schema::create('candies_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candy::class)->references('id')->on('candies');
            $table->foreignIdFor(Ingredient::class)->references('id')->on('ingredients');
            $table->float('ing_amount');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candies_ingredients');
    }
};
