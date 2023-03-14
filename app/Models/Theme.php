<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'idTravel'];

    public function travel() {
        return $this->belongsToMany(Travel::class); 
    }
}
