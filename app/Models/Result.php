<?php

namespace App\Models;

use App\Models\App;
use App\Models\Cpu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cpus()
    {
        return $this->hasOne(Cpu::class);
    }

    public function apps()
    {
        return $this->hasOne(App::class);
    }
}
