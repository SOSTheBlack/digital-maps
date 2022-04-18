<?php

namespace App\Models;

use Database\Factories\ApproximationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Models\Approximation
 *
 * @property int $id
 * @property int $user_id
 * @property string $uuid
 * @property int $latitude
 * @property int $longitude
 * @property int $meters
 * @property Carbon $time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property-read User|null $owner
 *
 * @method static ApproximationFactory factory(...$parameters)
 * @method static Builder|Approximation newModelQuery()
 * @method static Builder|Approximation newQuery()
 * @method static Builder|Approximation query()
 * @method static Builder|Approximation whereCreatedAt($value)
 * @method static Builder|Approximation whereDeletedAt($value)
 * @method static Builder|Approximation whereId($value)
 * @method static Builder|Approximation whereLatitude($value)
 * @method static Builder|Approximation whereLongitude($value)
 * @method static Builder|Approximation whereMeters($value)
 * @method static Builder|Approximation whereTime($value)
 * @method static Builder|Approximation whereUpdatedAt($value)
 * @method static Builder|Approximation whereUserId($value)
 * @method static Builder|Approximation whereUuid($value)
 *
 * @mixin Eloquent
 */
class Approximation extends BaseModel implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'latitude',
        'longitude',
        'meters',
        'time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'latitude' => 'int',
        'longitude' => 'int',
        'meters' => 'int',
        'time' => 'datetime:H:i',
    ];

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
