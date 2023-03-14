<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

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
        if (!Auth::validate($credentials)) :
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

    /**
     * Affichage de la page mot de passe oublié
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Affichage de la page réinitialisation mot de passe
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * 
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $token
            ])
            ->first();

        if ($updatePassword) {
            DB::table('password_reset_tokens')
                ->where([
                    'email' => $request->email,
                    'token' => $token
                ])
                ->update([
                    'token' => $token
                ]);
        }else{
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);
        }


        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Modification mot de passe');
        });

        return back()->with('success', 'Nous vous avons envoyé par e-mail le lien de réinitialisation de votre mot de passe !');
    }

    public function submitResetPasswordForm(UpdatePasswordRequest $request)
    {
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->withErrors('Votre lien est invalide');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('success', 'Votre mot de passe à été modifié');
    }
}
