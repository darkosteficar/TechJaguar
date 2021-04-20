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

    public function cpu()
    {
        return $this->belongsTo(Cpu::class);
    }

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
