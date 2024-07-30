<?php

declare(strict_types=1);

namespace App\Models\Product;

use App\Models\HasSlugByName;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use HasFactory, HasSlugByName, HasUuids, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Retrieve all products belonging to this category.
     */
    protected function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
