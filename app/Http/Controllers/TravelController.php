<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelRequest;
use App\Models\City;
use App\Models\Picture;
use App\Models\Theme;
use App\Models\Travel;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        return view('travel.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $themes = Theme::all();
        $types  = Type::all();
        return view('travel.create', compact('cities', 'themes', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelRequest $request)
    {
        $travel = Travel::create($request->validated());

        $travel->themes()->attach($request->themes);
        $travel->types()->attach($request->types);


        if ($request->pictures) {
            foreach ($request->pictures as $k => $picture) {
                $newName = $travel->id . '_' . $picture->getClientOriginalName();
                $newPicture = new Picture([
                    'name' => $request->picturesName[$k],
                    'idTravel' => $travel->id,
                    'url' => $picture->storeAs('travels', $newName),
                ]);
                $newPicture->save();
                $travel->pictures->add($newPicture);
            }
        }

        return redirect(route("travels.index"))->with('success', 'Voyage créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        $cities = City::all();
        $themes = Theme::all();
        $types  = Type::all();
        return view('travel.edit', compact('cities', 'themes', 'types', 'travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelRequest $request, Travel $travel)
    {
        $travel->update($request->validated());

        $travel->themes()->sync($request->themes);
        $travel->types()->sync($request->types);

        // Vérifie si les images actuelles ont été supprimer
        foreach ($travel->pictures as $picture) {
            if (
                !($request->crtImage) ||
                (($request->crtImage) && (!in_array($picture->id, $request->crtImage)))
            ) {
                if (Storage::disk('public')->exists($picture->url)) Storage::delete($picture->url);
                $picture->delete();
            }
        }

        // Ajout les nouvelles images
        if ($request->pictures) {
            foreach ($request->pictures as $k => $picture) {
                dump($picture);
                $newName = $travel->id . '_' . $picture->getClientOriginalName();
                $newPicture = new Picture([
                    'name' => $request->picturesName[$k],
                    'idTravel' => $travel->id,
                    'url' => $picture->storeAs('travels', $newName),
                ]);
                $newPicture->save();
                $travel->pictures->add($newPicture);
            }
        }

        return redirect()->route('travels.index')->with('success', 'Voyage modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        if ($travel->pictures->count() > 0) {
            foreach ($travel->pictures as $picture) {
                if (Storage::disk('public')->exists($picture->url)) Storage::delete($picture->url);
            }
        }

        $travel->delete();
        return redirect(route('travels.index'))->with('success', 'Voyage supprimé !');
    }
}
