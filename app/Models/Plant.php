<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function seed(){
        return $this->belongsTo(Seed::class);
    }
    public function fruit(){
        return $this->belongsTo(Fruit::class);
    }
}
