<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name', 'description', 'price', 'active',
        'published', 'published_at',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public function fillAttributes(array $attributes): static
    {
        return $this->fill([
            'name' => $attributes['name'],
            'price' => $attributes['price'],
            'description' => $attributes['description'],
            'published_at' => new Carbon($attributes['published_at']) ?? null,
            'published' => $attributes['published'] ?? false,
        ]);
    }
}
