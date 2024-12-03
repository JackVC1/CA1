<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::all(); //Fetches all competitions
        return view('competitions.index', compact('competitions')); //Returns the view with all competitions
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('teams.index')->with('error', 'Access Denied.');
        }

        //if I want to add competitions to a team during create competition, i will need all teams
        $teams = Team::all();
        return view('competitions.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('teams.index')->with('error', 'Access Denied.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'format' => 'required|string|max:255',
            'prize_money' =>'required|numeric|',
        ]);

        //Get the image from the request
        if ($request->hasFile('image')) {
            //give image an unique name
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/teams'), $imageName);

            $validated['image'] = $imageName;
        }

        $competition = Competition::create($validated);

        if ($request->has('teams')) {
            $competition->teams()->attach($request->teams);
        }

        return redirect()->route('competitions.index')->with('success', 'Competition Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        $competition->load('teams');
        return view('competitions.show')->with('competition', $competition);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        //get all the teams
        $teams = Team::all();
        $competitionTeams = $competition->teams->pluck('id')->toArray(); //IDs of associated Teams
        return view('competitions.edit', compact('competition', 'teams', 'competitionTeams'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'format' => 'required|string|max:255',
            'prize_money' =>'required|numeric|',
        ]);

        $competition->update($validated);

        if ($request->has('teams')) {
            $competition->teams()->sync($request->teams);
        }

        return redirect()->route('competitions.index')->with('success', 'Competition Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->teams()->detach();
        $competition->delete();

        return redirect()->route('competitions.index')->with('success', 'Competition Deleted Successfully!');
    }
}
