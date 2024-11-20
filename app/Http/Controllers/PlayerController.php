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
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'position' => 'required|string',
            'country' => 'required|string',
            'signed_from' => 'required|string',
        ]);

        $team->players()->create([
            'team_id' => auth()->id(),
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'position' => $request->input('position'),
            'country' => $request->input('country'),
            'signed_from' => $request->input('signed_from'),
        ]);

        return redirect()->route('teams.show', $team)->with('success', 'player added successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
