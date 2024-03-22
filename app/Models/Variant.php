<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'targeting_ratio',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
