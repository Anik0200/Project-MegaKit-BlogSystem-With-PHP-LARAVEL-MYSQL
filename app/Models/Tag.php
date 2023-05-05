<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
