<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
 * @property int $time
 * @property string $meters
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approximation whereUuid($value)
 * @mixin \Eloquent
 */
class Approximation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
