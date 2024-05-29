<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable =
    [
        'slug',
        'title',
        'body',
        'kategori_id',
        'status',
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // funsgi untuk membuat slug otomatis
    public static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            $slug = Str::slug($blog->title);
            $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $blog->slug = $count ? "{$slug}-{$count}" : $slug;
        });
        static::updating(function ($blog) {
            $original_slug = $blog->slug;
            $slug = Str::slug($blog->title);
            $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->where('id', '!=', $blog->id)->count();
            $blog->slug = $count ? "{$slug}-{$count}" : $slug;
            if ($original_slug != $blog->slug) {
                Post::where('id', $blog->id)->update(['slug' => $blog->slug]);
            }
        });
    }
}
