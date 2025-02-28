<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }


    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
