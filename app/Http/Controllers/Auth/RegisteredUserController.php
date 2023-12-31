<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'date'],
        ],[
            'password.confirmed' => 'Le password alla registrazione non coincidono, inserisci due password uguali!!',
            'name.required' => 'Il campo del nome è obbligatorio',
            'name.min' => 'Il nome deve contenere almeno 3 caratteri',
            'surname.min' => 'Il cognome deve contenere almeno 3 caratteri',
            'surname.required' => 'Ilcampo del cognome è obbligatorio',
            'email.required' => 'Il campo email è obbligatorio',
            'password.required' => 'Il campo password è obbligatorio',
            'date_of_birth' => 'La data di nascita è obbligatoria'
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' =>$request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' =>$request->date_of_birth,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
