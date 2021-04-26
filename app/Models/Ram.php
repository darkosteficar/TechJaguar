<?php

namespace App\Models;

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

    public function image()
    {
        return $this->morphTo(Image::class,'imageable');
    }
}
