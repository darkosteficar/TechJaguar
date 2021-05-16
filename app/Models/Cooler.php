<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cooler extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
