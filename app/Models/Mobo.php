<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Chipset;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function chipset()
    {
        return $this->belongsTo(Chipset::class);
    }

    public function images()
    {
        return $this->morpTo(Image::class,'imageable_type');
    }
}
