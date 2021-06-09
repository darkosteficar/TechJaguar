<?php

namespace App\Models;

use App\Models\Build;
use App\Models\Image;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ram extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function builds()
    {
        return $this->morphToMany(Build::class,'buildable');
    }

    public function scopeSearch($query,$val)
    {
        return $query->where('name','like','%' . $val . '%')->orWhere('speed','like','%' . $val . '%')->orWhere('type','like','%' . $val . '%')->orWhere('size','like','%' . $val . '%');
    }
}
