<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function cartoons(){
        return $this->belongsToMany(Cartoon::class);
    }
}
