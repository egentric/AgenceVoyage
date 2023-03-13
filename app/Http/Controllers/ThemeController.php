<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeRequest;
use App\Models\Theme;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('theme.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('theme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemeRequest $request)
    {
       // Créer le post, et enregistre l'image dans le dossier storage
       $theme = Theme::create($request->validated());

        return redirect(route("themes.index"))->with('success', 'Thème créer !'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view("theme.edit", compact("theme"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThemeRequest $request, Theme $theme)
    {
        $theme->update($request->validated());
        return redirect(route("themes.index"))->with('success', 'Thème modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect(route('themes.index'))->with('success', 'Thème supprimé !');
    }
}
