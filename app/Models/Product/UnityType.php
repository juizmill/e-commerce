<?php

declare(strict_types=1);

namespace App\Models\Product;

use App\Models\HasSlugByName;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class UnityType extends Model
{
    use HasFactory, HasSlugByName, HasUuids, SoftDeletes;

    protected $guarded = ['id'];
}
