<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asked;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AskedsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        $user = User::all();
        $askeds = Asked::all();
        return view('askeds.index', compact('travels', 'user', 'askeds'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travels = Travel::all();
        $user = User::all();
        $askeds = Asked::all();
        return view('askeds.create', compact('travels', 'user', 'askeds'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numberpeople' => 'required',
            'status' => 'required',
            'idUser' => 'required',
            'idTravel' => 'required'

        ]);

        Asked::create([
            'numberpeople' => $request ->numberPeople,
            'status' => $request ->status,
            'idUser' => $request ->idUser,
            'idTravel' => $request ->idTravel,

        ]);
        return redirect()->route('askeds.index')
        ->with('success', 'Produit ajouté avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $travels = Travel::all();
        $user = User::all();
        $askeds = Asked::all();
        return view('askeds.show', compact('travels', 'user', 'askeds'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $askeds = Asked::findOrFail($id);
        return view('askeds.edit', compact('askeds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateAsked = $request->validate([
            'numberpeople' => 'required',
            'status' => 'required'
        ]);
        Asked::whereId($id)->update($updateAsked);
        return redirect()->route('askeds.index')
        ->with('success', 'La demande à été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asked $askeds)
    {
        $askeds->delete();
        return redirect(route('askeds.index'))->with('success', 'Demande supprimée !');
    }
}
