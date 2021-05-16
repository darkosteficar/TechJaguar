<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;
    protected $guarded = [];
    
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
}
