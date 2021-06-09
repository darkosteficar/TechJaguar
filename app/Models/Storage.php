<?php

namespace App\Models;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Storage extends Model
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

    public function scopeSearch($query,$val)
    {
        return $query->where('name','like','%' . $val . '%')->orWhere('type','like','%' . $val . '%')->orWhere('cache','like','%' . $val . '%')->orWhere('interface','like','%' . $val . '%');
    }
}
