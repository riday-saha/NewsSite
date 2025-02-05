<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function posts(){
        return $this->hasMany(post::class);
    }

    public function SelectCategoryModel(){
        return $this->hasMany(SelectCategoryModel::class);
    }
}
