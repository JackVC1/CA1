<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminte\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all(); //Fetches all teams
        return view('teams.index', compact('teams')); //Returns the view with teams
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manager' => 'required',
            'location' => 'required',
            'stadium' => 'required',
            'attendance' => 'required|integer',
            'established' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if there’s an uploaded image and handle the upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/teams'), $imageName);
        }

        // Create the new team record
        Team::create([
            'name' => $request->name,
            'manager' => $request->manager,
            'location' => $request->location,
            'stadium' => $request->stadium,
            'attendance' => $request->attendance,
            'established' => $request->established,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('teams.index')->with('success', 'Team created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
