<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false,
            fn ($query, $search) => $query
                ->where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
        );

        $query->when($filters['category'] ?? false,
            fn ($query, $category) => $query
                ->whereHas('category', fn ($query) => $query->where('slug', $category)));

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        // If a foreign key is specified, it will be a match to the specified key
        // otherwise it will be a match to the "function_id"
        return $this->belongsTo(User::class, 'user_id');
    }
}
