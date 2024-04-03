<?php

namespace App\Models;

use App\Models\HomeImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeList extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function homeImage()
    {
        return $this->hasMany(HomeImage::class,'home_id','id');
    }
    public function homeCategory()
    {
        return $this->belongsTo('App\Models\HomeCategory', 'category_id', 'id');
    }
    public function getPriceAttribute()
    {
        if ($this->homeCategory->slug == 'sewa') {
            return 'Rp. ' . number_format($this->attributes['price']) . ' Juta / bulan';
        } else {
            return 'Rp. ' . number_format($this->attributes['price']) . ' Juta';
        }
    }    
    public function bookings()
    {
        return $this->hasOne(Booking::class,'home_id','id');
    }
    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('building_area', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('land_area', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('number_of_bedrooms', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('number_of_bathrooms', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('electrical_power', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('price', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('status', 'LIKE', '%' . $keyword . '%');
    }
}
