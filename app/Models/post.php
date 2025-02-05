<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'post_title',
        'post_description',
        'image',
        'status',
        'user_id',
        'category',
        'trending'
    ];

    public function categury(){ //function name was same thats why data is not showing
        return $this->belongsTo(Category::class,'category','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
