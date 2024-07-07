<?php

declare(strict_types=1);

namespace App\Models\Product;

use Carbon\Carbon;
use App\Models\HasSlugByName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class Category extends Model
{
    use HasFactory, HasUuids, SoftDeletes, HasSlugByName;

    protected $guarded = ['id'];

    /**
     * Retrieve all products belonging to this category.
     *
     * @return HasMany
     */
    protected function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
