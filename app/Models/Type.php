<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($value){
        return Str::slug($value, '-');
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
