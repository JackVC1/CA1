<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{
    use HasFactory;

    // these fields must be filled when creating a competition
    protected $fillable = ['name', 'image', 'format', 'prize_money'];

    // teams in plural as a Competition can have many Teams
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
