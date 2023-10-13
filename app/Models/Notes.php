<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Notes extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'author',
        'category'
    ];

    public function scopeFilter($query, array $requests)
    {
        $query->where('user_id', '=', auth()->user()->id);

        $query->when($requests['search'] ?? false, function($query, $search) {
            $query->where(fn($query) =>
                $query->where('title', 'like', '%'.$search.'%')
            );
        });

        $query->when($requests['category'] ?? false, function($query, $category) {
            $query->whereHas('category', fn($query) =>
                $query->where('name', $category)
            );
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function content()
    {
        return $this->hasMany(NoteContent::class, 'note_id');
    }
}
