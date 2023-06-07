<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description', 'year_of_development','type_id'];

    public static function generateSlug($value){
        return Str::slug($value, '-');
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
