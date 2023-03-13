<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'intro', 'description', 'duration', 'price', 'idCity'];

    public function city() {
        return $this->belongsTo(City::class); 
    }

    public function askeds() {
        return $this->hasMany(Asked::class);
    }

    public function themes() {
        return $this->hasMany(Theme::class);
    }

    public function types() {
        return $this->hasMany(Type::class);
    }

    public function pictures() {
        return $this->hasMany(Picture::class);
    }
}
