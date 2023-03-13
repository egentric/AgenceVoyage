<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asked extends Model
{
    use HasFactory;

    protected $fillable = ['numberPeople', 'statusAsked', 'idTravel', 'idUser'];

    public function user() {
        return $this->belongsTo(User::class); 
    }

    public function travel() {
        return $this->belongsTo(Travel::class); 
    }
}
