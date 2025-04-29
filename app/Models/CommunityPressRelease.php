<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityPressRelease extends Model
{
    use HasFactory;

    protected $table = 'community_press_release';
    public $timestamps = false;

    protected $fillable = [
        'banner_heading',
        'thumbnail',
        'blog_heading',
        'url',
        'slug',
        'inserted_at',
        'inserted_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
