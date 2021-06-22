<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'crossfire' => 'boolean',
    ];

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
        return $this->morphMany(Image::class,'imageable');
    }

    public function scopeSearch($query,$val)
    {
        return $query->where('name','like','%' . $val . '%')->orWhere('series','like','%' . $val . '%')->orWhere('vram_type','like','%' . $val . '%')->orWhere('power_req','like','%' . $val . '%');
    }
}
