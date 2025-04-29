<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocktailDetails extends Model
{
    use HasFactory;

    protected $table = 'cocktail_details';
    public $timestamps = false;

    protected $fillable = [
        'banner_image',
        'blog_title_id',
        'description',
        'method',
        'ingredients',
        'inserted_at',
        'inserted_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    public function blog()
    {
        return $this->belongsTo(Cocktails::class, 'blog_title_id'); 
    }
}
