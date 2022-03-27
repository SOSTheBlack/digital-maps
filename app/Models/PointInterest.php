<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Models\PointInterest
 *
 * @property int $id
 * @property int $user_id
 * @property string $uuid
 * @property string $name
 * @property int $latitude
 * @property int $longitude
 * @property \Illuminate\Support\Carbon|null $opened
 * @property \Illuminate\Support\Carbon|null $closed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $owner
 * @method static \Database\Factories\PointInterestFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest newQuery()
 * @method static \Illuminate\Database\Query\Builder|PointInterest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereOpened($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointInterest whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|PointInterest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PointInterest withoutTrashed()
 * @mixin \Eloquent
 */
class PointInterest extends BaseModel implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'uuid',
        'name',
        'latitude',
        'longitude',
        'opened',
        'closed'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'latitude' => 'int',
        'longitude' => 'int',
        'opened' => 'datetime:H:i',
        'closed' => 'datetime:H:i'
    ];

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
