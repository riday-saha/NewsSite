<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectCategoryModel extends Model
{
    protected $fillable = [
        'select_Cat'
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'select_Cat','id');
    }
}
