<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chipset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cpus()
    {
        return $this->belongsToMany(Cpu::class,'chipset_cpus');
    }
}
