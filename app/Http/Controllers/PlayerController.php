<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $players = Player::all(); // Fetch all players from the database

    return view('backend.players.index', compact('players'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:10',
            'status' => 'required|max:255',
            'team' => 'required|max:255',
            'league' => 'required|max:255',
        ]);

        Player::create([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
            'status' => $request->input('status'),
            'team' => $request->input('team'),
            'league' => $request->input('league'),
        ]);

        return redirect()->route('players.index')->with('success', 'Player created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
