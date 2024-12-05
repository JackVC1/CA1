<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Represents Teams table in database
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manager',
        'location',
        'stadium',
        'attendance',
        'established',
        'image',
    ];

    // players written as plural as a Team can have many Players
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    // competitions written as a plural as a Team can be in many Competitions
    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
    }

}
