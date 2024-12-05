<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    //the player being added belongs to a team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    //the player being added belongs to the user who added them
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // These fields must be filled in for a player to be successfully created
    protected $fillable = [
        'team_id',
        'user_id',
        'name',
        'age',
        'position',
        'country',
        'signed_from',
    ];
}
