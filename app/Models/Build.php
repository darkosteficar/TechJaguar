<?php

namespace App\Models;

use App\Models\Fan;
use App\Models\Gpu;
use App\Models\Ram;
use App\Models\User;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Build extends Model
{
    use HasFactory;

    protected $fillable =['name','user_id'];


    public function rams()
    {
        return $this->morphedByMany(Ram::class,'buildable');
    }

    public function storages()
    {
        return $this->morphedByMany(Storage::class,'buildable');
    }

    public function gpus()
    {
        return $this->morphedByMany(Gpu::class,'buildable');
    }

    public function fans()
    {
        return $this->morphedByMany(Fan::class,'buildable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
