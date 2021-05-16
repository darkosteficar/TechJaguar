<?php

namespace App\Models;

use App\Models\Ram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Build extends Model
{
    use HasFactory;


    public function rams()
    {
        return $this->morphedByMany(Ram::class,'buildable');
    }
}
