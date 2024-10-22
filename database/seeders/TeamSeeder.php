<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   // This function will populate the database with some initial data - it uses the variables set in migration table
        $currentTimestamp = Carbon::now();
            Team::insert([
                 [
                 'name' => 'Bray Wanderers',
                 'manager' => 'Paul Heffernan',
                 'image' => 'bray-wanderers-crest.png',
                 'location' => 'Bray',
                 'stadium' => 'Carlisle Grounds',
                 'attendance' => 670, 'established' => 1922,
                 'created_at' => $currentTimestamp,
                 'updated_at' => $currentTimestamp
                 ],
                 [
                 'name' => 'Shamrock Rovers',
                 'manager' => 'Stephen Bradley',
                 'image' => 'shamrock-rovers-crest.png',
                 'location' => 'Tallaght',
                 'stadium' => 'Tallaght Stadium',
                 'attendance' => 6151,
                 'established' => 1899,
                 'created_at' => $currentTimestamp,
                 'updated_at' => $currentTimestamp
                 ],
                 [
                 'name' => 'Cobh Ramblers',
                 'manager' => 'Gary Hunt',
                 'image' => 'cobh-ramblers-crest.png',
                 'location' => 'Cork',
                 'stadium' => 'St.Colmans Park',
                 'attendance' => 749,
                 'established' => 1922,
                 'created_at' => $currentTimestamp,
                 'updated_at' => $currentTimestamp
                 ]
            ]);
    }
}
