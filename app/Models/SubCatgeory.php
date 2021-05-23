<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCatgeory extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'parent_category_id',
        'child_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'parent_category_id')->select(['id','name']);
    }

    public function getChildCategoryId($value)
    {
        dd($value);
        // return !empty($value) ? $value : 0;
    }


}
