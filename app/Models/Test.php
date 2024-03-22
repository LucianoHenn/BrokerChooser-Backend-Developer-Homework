<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\StatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'status' => StatusEnum::class,
    ];

    protected $keyType = 'string';

    public $incrementing = false;


    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Define the relationship with the Type model.
     */
    public function type()
    {
        return $this->belongsTo(TestType::class);
    }

    /**
     * Scope a query to only include tests with an active status.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', StatusEnum::Active);
    }

    /**
     * Create test with variants.
     *
     * @param array $data
     * @param array $variants
     * @return Test
     */
    public static function createWithVariants(array $data, array $variants): Test
    {
        $test = static::create($data);

        foreach ($variants as $variantData) {
            $test->variants()->create($variantData);
        }

        return $test;
    }

    /**
     * Method to start the test.
     *
     * @return void
     */
    public function run(): bool
    {
        if ($this->status !== StatusEnum::Pending) {
            return false;
        }

        $this->status = StatusEnum::Active;
        $this->started_at = Carbon::now();
        $this->save();

        return true;
    }

    /**
     * Method to stop the test.
     *
     * @return void
     */
    public function stop(): bool
    {
        if ($this->status !== StatusEnum::Active) {
            return false;
        }

        $this->status = StatusEnum::Finished;
        $this->finished_at = Carbon::now();
        $this->save();

        DB::table('events')
            ->where('type', $this->id)
            ->update(['data->active' => false]);


        return true;
    }
}
