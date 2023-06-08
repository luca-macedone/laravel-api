<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    private $fillable = ['name', 'slug'];

    public static function generateSlug($value){
        return Str::slug($value, '-');
    }

    public function projects() {
        return $this->belongsToMany('App\Models\Project');
    }
}
