<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandyIngredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candies_ingredients';
    protected $fillable = [
        'candy_id',
        'ingredient_id',
        'ing_amount'
    ];

    public function candy()
    {
        return $this->belongsTo(Candy::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
