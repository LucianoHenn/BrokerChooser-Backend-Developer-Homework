<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'description'
    ];

    /**
     * @return HasMany<Test>
     */
    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }
}
