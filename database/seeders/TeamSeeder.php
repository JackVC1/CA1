<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Competition;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    function run(): void
    {   // This function will populate the database with some initial data - it uses the variables set in migration table
        $currentTimestamp = Carbon::now();


        $teams = [
            [
                 'name' => 'Bray Wanderers',
                 'manager' => 'Paul Heffernan',
                 'image' => 'bray-wanderers-crest.png',
                 'location' => 'Bray',
                 'stadium' => 'Carlisle Grounds',
                 'attendance' => 670, 'established' => 1922,
                 ],
                 [
                 'name' => 'Shamrock Rovers',
                 'manager' => 'Stephen Bradley',
                 'image' => 'shamrock-rovers-crest.png',
                 'location' => 'Tallaght',
                 'stadium' => 'Tallaght Stadium',
                 'attendance' => 6151,
                 'established' => 1899,
                 ],
                 [
                 'name' => 'Cobh Ramblers',
                 'manager' => 'Gary Hunt',
                 'image' => 'cobh-ramblers-crest.png',
                 'location' => 'Cork',
                 'stadium' => 'St.Colmans Park',
                 'attendance' => 749,
                 'established' => 1922,
                 ]
            ];

            foreach ($teams as $teamData)
            {
                //insert the team into the team table
                $team = Team::create(array_merge($teamData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

                //randomly select two competitions !note - competitions must exist in the competitions table
                $competitions = Competition::inRandomOrder()->take(2)->pluck('id');

                // Attach competitions to teams
                // Laravels attach() function inserts a row in the pivot table indicating that this team plays in this competition
                // You need to have the relationships and pivot table set up correctly for this to work
                $team->competitions()->attach($competitions);
            }
    }
}
