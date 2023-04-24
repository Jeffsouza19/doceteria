<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candies';
    protected $fillable = [
        'candy_name',
        'amount'
    ];

    public function candyIngredients()
    {
        return $this->hasMany(CandiesIngredients::class);
    }
}
