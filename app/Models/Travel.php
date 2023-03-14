<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'travels';
    protected $fillable = ['name', 'intro', 'description', 'duration', 'price', 'departCity', 'destinationCity'];

    public function destination() {
        return $this->belongsTo(City::class, 'destinationCity', 'id'); 
    }

    public function askeds() {
        return $this->hasMany(Asked::class);
    }

    public function themes() {
        return $this->belongsToMany(Theme::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class, 'type_travel');
    }

    public function pictures() {
        return $this->hasMany(Picture::class, 'idTravel', 'id');
    }
}
