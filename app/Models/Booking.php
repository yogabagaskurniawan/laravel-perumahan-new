<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function homeList()
    {
        return $this->belongsTo(HomeList::class, 'home_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function homeImage()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }   
}
