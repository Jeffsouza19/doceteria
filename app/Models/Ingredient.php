<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredients';
    protected $fillable = [
        'ing_name',
        'amount',
        'cost'
    ];

    public function candyIngredients()
    {
        return $this->hasMany(CandiesIngredients::class);
    }
}
