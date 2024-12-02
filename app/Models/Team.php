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

    // Team can have many Players
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    // Team can have many Competitions
    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
    }

}
