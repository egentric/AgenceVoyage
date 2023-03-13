<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        return view('user.index', compact('users'));

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
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            // 'pseudo' => 'required|max:40',
            'email' => 'required|string',
            'firstName' =>'required|string',
            'lastName' =>'required|string',
            'address' =>'required|string',
            'zip' =>'required|string',
            'city' =>'required|string',
            'phone' =>'required|string',
            'role' =>'nullable|string'


        ]);

                //on modifie les infos de l'utilisateur
                // $user->pseudo = $request->input('pseudo');
                $user->email = $request->input('email');
                $user->firstName = $request->input('firstName');
                $user->lastName = $request->input('lastName');
                $user->address = $request->input('address');
                $user->zip = $request->input('zip');
                $user->city = $request->input('city');
                $user->phone = $request->input('phone');
                $user->role = $request->input('role');
                
                //on sauvegarde les changements en bdd
                $user->save();
                
        
               // Vérifier si l'utilisateur connecté a le rôle d'admin
            if (Auth::user()->role->role === 'admin') {
                // Rediriger vers la page d'index des utilisateurs
                return redirect()->route('user.index', [$user])->with('success', 'Le compte a bien été modifié');
            } else {
                // Rediriger vers la page du tableau de bord
                return view('dashboard')->with('success', 'Le compte a bien été modifié');
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
                //on vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression
        //(les id doivent être identique)
        if (Auth::user()->id == $user->id){
            $user->delete();    //on réalise la supression
            return redirect()->route('/')
                ->with('message', 'Le compte a été supprimé');      
        }else{
            return redirect()->back()
                ->withErrors(['erreur' => 'Suppression du compte impossible']);      
        }

    }
}
