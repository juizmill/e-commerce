<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Model<mixed>
 */
trait HasSlugByName
{
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (Model $model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
