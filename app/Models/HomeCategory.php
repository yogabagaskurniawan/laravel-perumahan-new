<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function homeList()
    {
        return $this->hasMany('App\Models\HomeList', 'category_id', 'id');
    }
}
