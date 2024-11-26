<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PlayerController extends Controller
{

    public function up()
    {
        Schema::create('players', function (Blueprint $table){
            $table->id();
            //cascade here means if a team is deleted - so are the players
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('name');
            $table->integer('age');
            $table->text('position')->nullable();
            $table->text('country')->nullable();
            $table->text('signed_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Team $team)
{
    // Validation for the incoming player data
    $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'position' => 'required|string',
        'country' => 'required|string',
        'signed_from' => 'required|string',
    ]);

    // Create a new player associated with the team and authenticated user
    $team->players()->create([
        'team_id' => $team->id, // Correctly associating the team
        'user_id' => auth()->id(), // Associate the player with the authenticated user
        'name' => $request->input('name'),
        'age' => $request->input('age'),
        'position' => $request->input('position'),
        'country' => $request->input('country'),
        'signed_from' => $request->input('signed_from'),
    ]);

    // Redirect back to the team's details page with success message
    return to_route('teams.index')->with('success', 'Player created successfully!');
}



    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        // Check if the user is the player owner or an admin
        if (auth()->user()->id !== $player->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('teams.index')->with('error', 'Access Denied.');
        }

        // I am passing the team and the player object to the view, as they are both needed
        return view('players.edit', compact('player'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        // only alter variables not team and user id
        $player->update($request->only(['name', 'age', 'position', 'country', 'signed_from']));

        return redirect()->route('teams.show', $player->team_id)
                         ->with('success', 'Player Updated Successfully!');

        return to_route('teams.index')->with('success', 'Player updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return to_route('teams.index')->with('success', 'Player deleted successfully!');
    }
}
