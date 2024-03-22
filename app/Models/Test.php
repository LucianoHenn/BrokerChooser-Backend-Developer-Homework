<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\StatusEnum;


class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'status' => StatusEnum::class,
    ];


    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Scope a query to only include tests with an active status.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', StatusEnum::Active);
    }
}
