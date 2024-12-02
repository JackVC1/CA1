<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::insert([
            ['name' => 'Premier Division', 'image' => 'premier-division-logo.png', 'format' => 'League', 'prize_money' => 60000],
            ['name' => 'First Division', 'image' => 'first-division-logo.png', 'format' => 'League', 'prize_money' => 40000],
            ['name' => 'Leinster Senior Cup', 'image' => 'lsc.jpg', 'format' => 'Groups & Knock-Out', 'prize_money' => 8000],
            ['name' => 'Munster Senior Cup', 'image' => 'msc.jpg', 'format' => 'Knock-Out', 'prize_money' => 5000],
            ['name' => 'FAI Cup', 'image' => 'fai_cup.jpg', 'format' => 'Cup Knock-Out', 'prize_money' => 100000],
            ['name' => 'Presidents Cup', 'image' => 'president.jpg', 'format' => 'Final', 'prize_money' => 20000],
        ]);
    }
}
