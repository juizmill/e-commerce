<?php

declare(strict_types=1);

namespace App\Models\Product;

use Carbon\Carbon;
use App\Models\HasSlugByName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $ncm
 * @property string|null $cest
 * @property int $warranty
 * @property int $height
 * @property int $width
 * @property int $length
 * @property int $weight
 * @property int $tax_origin
 * @property string|null $description
 * @property string|null $short_description
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes, HasSlugByName;

    protected $guarded = ['id'];

    /**
     * Get the brand that the product belongs to.
     *
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the category that the product belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the unity type that the product belongs to.
     *
     * @return BelongsTo The unity type relationship.
     */
    public function unityType(): BelongsTo
    {
        return $this->belongsTo(UnityType::class);
    }

    /**
     * Get the variations associated with the product.
     *
     * @return HasMany The variations' relationship.
     */
    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }
}
