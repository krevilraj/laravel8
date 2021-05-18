<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    //kun kun column ma data jane
    protected $fillable = [
        'title', 'subtitle', 'link', 'image','status','user_id'
    ];

    //rule scope
    public function scopeActive($query){
        return $query->where('status',true)->get();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
