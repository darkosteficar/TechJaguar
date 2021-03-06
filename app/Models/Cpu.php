<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'smt'=>'boolean',
        'integrated_graphics'=>'boolean'
    ];
    
    public function chipsets()
    {
        return $this->belongsToMany(Chipset::class,'chipset_cpus');
    }
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
        return $query->where('name','like','%' . $val . '%')->orWhere('microarchitecture','like','%' . $val . '%')->orWhere('series','like','%' . $val . '%')->orWhere('socket','like','%' . $val . '%');
    }
}
