<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function comments() {
        return $this->hasMany('App\Models\Comment','blog_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}

