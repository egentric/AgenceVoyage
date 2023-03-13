<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Asked;
use App\Models\Theme;
use App\Models\Travel;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::orderBy('created_at', 'desc')->take(3)->get();
        $themes = Theme::orderBy('created_at', 'desc')->take(3)->get();
        $types = Type::orderBy('created_at', 'desc')->take(3)->get();
        $countries = Country::orderBy('created_at', 'desc')->take(3)->get();
        $cities = City::orderBy('created_at', 'desc')->take(3)->get();
        $askeds = Asked::orderBy('created_at', 'desc')->take(3)->get();
        $contacts = Contact::orderBy('created_at', 'desc')->take(3)->get();

        $users = User::orderBy('created_at', 'desc')->take(3)->get();

        return view('dashboard', compact('travels', 'themes', 'types', 'countries', 'cities', 'askeds', 'contacts', 'users'));

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
    public function store(Request $request)
    {
        //
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
