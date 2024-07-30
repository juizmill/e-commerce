<?php

declare(strict_types=1);

namespace App\Models\Product;

use App\Casts\Money;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property float|int|string $price
 * @property float|int|string $purchase_price
 * @property int $quantity
 * @property string $sku
 * @property string $model
 * @property string $ean
 * @property int $pis
 * @property int $cofins
 * @property int $icms
 * @property array $images
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class Variation extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'price' => Money::class,
        'purchase_price' => Money::class,
        'images' => 'json',
    ];

    /**
     * Retrieve the associated VariationType model.
     *
     * @return BelongsTo The belongs to relationship.
     */
    public function variationType(): BelongsTo
    {
        return $this->belongsTo(VariationType::class);
    }

    /**
     * Retrieve the associated product for this variation.
     *
     * @return BelongsTo The product relationship.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
