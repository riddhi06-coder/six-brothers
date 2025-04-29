<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktails extends Model
{
    use HasFactory;

    protected $table = 'cocktails';
    public $timestamps = false;

    protected $fillable = [
        'thumbnail',
        'blog_heading',
        'slug',
        'description',
        'inserted_at',
        'inserted_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
