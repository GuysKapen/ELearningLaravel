<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed|string $name
 * @property string $slug
 * @property int $category_id
 */
class SubCategory extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
