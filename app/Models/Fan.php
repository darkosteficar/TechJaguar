<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fan extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }


    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function scopeSearch($query,$val)
    {
        return $query->where('name','like','%' . $val . '%')->orWhere('speed','like','%' . $val . '%')->orWhere('noise','like','%' . $val . '%')->orWhere('air_flow','like','%' . $val . '%');
    }
}
