<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartoon extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'year',
        'rating',
        'runtime_in_minutes',
        'episodes',
        'image'
    ];

    public function creators(){
        return $this->belongsToMany(Creator::class);
    }
}
