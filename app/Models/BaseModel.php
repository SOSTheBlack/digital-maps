<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\BaseModel
 *
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 * @mixin Eloquent
 */
abstract class BaseModel extends Model
{
    /**
     * Column name uuid.
     *
     * @const string
     */
    public const KEY_UUID = "uuid";

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            if (collect($model->getFillable())->filter(fn(string $columnName) => $columnName === self::KEY_UUID)->isNotEmpty()) {
                $model->uuid = (string) Uuid::uuid4();
            }
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return self::KEY_UUID;
    }
}
