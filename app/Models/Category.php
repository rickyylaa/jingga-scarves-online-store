<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge bg-light-info">Draft</span>';
        }
        return '<span class="badge bg-light-primary">Publish</span>';
    }

    public function scopeGetParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
