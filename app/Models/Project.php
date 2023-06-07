<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description', 'year_of_development'];

    public static function generateSlug($value){
        return Str::slug($value, '-');
    }
}
