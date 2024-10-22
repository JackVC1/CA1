<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
            Team::insert([
                ['name' => 'Bray Wanderers', 'manager' => 'Paul Heffernan', 'location' => 'Bray',
                'stadium' => 'Carlisle Grounds', 'attendance' => 670, 'established' => 1922,
                'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Shamrock Rovers', 'manager' => 'Stephen Bradley', 'location' => 'Tallaght',
                'stadium' => 'Tallaght Stadium', 'attendance' => 6151, 'established' => 1899,
                'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Cobh Ramblers', 'manager' => 'Gary Hunt', 'location' => 'Cork',
                'stadium' => 'St.Colmans Park', 'attendance' => 749, 'established' => 1922,
                'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]
            ]);
    }
}
