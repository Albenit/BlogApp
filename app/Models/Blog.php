<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $guarded = [];

    public function category(){
       return $this->belongsTo(Category::class,'category_id','id')->withDefault(['category_name' => 'No Category Founded']);
    }

}
