<?php

namespace App\Models\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'logo',
        'site_name',
        'email',
        'address',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}