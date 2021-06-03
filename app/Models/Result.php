<?php

namespace App\Models;

use App\Models\App;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Ram;
use App\Models\Mobo;
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
    public function gpu()
    {
        return $this->belongsTo(Gpu::class);
    }
    public function mobo()
    {
        return $this->belongsTo(Mobo::class);
    }
    public function ram()
    {
        return $this->belongsTo(Ram::class);
    }
}
