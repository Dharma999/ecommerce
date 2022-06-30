<?php

namespace App\Models\Admin\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'summary',
        'content',
        'status',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    // relationship belongsto one

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
