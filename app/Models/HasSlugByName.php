<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
