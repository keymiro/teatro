<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'row',
        'column' ,
        'created_at',
        'updated_at'
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
