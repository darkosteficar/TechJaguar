<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function images()
    {
        return $this->morpTo(Image::class,'imageable_type');
    }
}
