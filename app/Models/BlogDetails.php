<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blogs;

class BlogDetails extends Model
{
    use HasFactory;

    protected $table = 'blog_details';
    public $timestamps = false;

    protected $fillable = [
        'banner_image',
        'blog_title_id',
        'description',
        'inserted_at',
        'inserted_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    public function blog()
    {
        return $this->belongsTo(Blogs::class, 'blog_title_id'); // assuming blog_title_id is the foreign key
    }
}
