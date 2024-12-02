<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'format', 'prize_money'];

    // Competition can have many Teams
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
