<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function booted() {
        static::creating(function (Product $product) {
            $product->slug = strtolower(Str::slug($product->name .'-' . time()));
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    protected $fillable = [
        'category_id',
        'picture',
        'name',
        'slug',
        'description',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
    ];

    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
