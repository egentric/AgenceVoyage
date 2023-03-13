<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Affichage de la page login
     * 
     * @return Renderable
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Traitement de la demande de connexion
     * 
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors('Email ou mot de passe incorrect.');
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Traitement après la connexion
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect('/dashboard');
    }

    /**
     * Affichage de la page register
     * 
     * @return Renderable
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Traitement de la demande de connexion
     * 
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create(array_merge($request->validated(), [
            'password' => Hash::make($request->password),
        ]));
        return redirect(route('login'))->with('success', 'Votre compte à été créé.');
    }

    /**
     * Déconnexion
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
