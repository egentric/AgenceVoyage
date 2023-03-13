<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        // Créer le post, et enregistre l'image dans le dossier storage
        $country = Country::findOrFail($request->country);
        $city = City::create(array_merge($request->validated(), [
            'idCountry' => $country->id,
        ]));

        return redirect(route("cities.index"))->with('success', 'Ville créer !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::all();
        return view("city.edit", compact("city", "countries"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {
        $country = Country::findOrFail($request->country);
        $city->update(array_merge($request->validated(), [
            'idCountry' => $country->id,
        ]));
        
        return redirect(route("cities.index"))->with('success', 'Ville modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect(route('cities.index'))->with('success', 'Ville supprimée !');
    }
}
