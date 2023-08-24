<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Conduce con Nosotros | Servicio de Transporte "Cochabamba"',
            "active" => "login",
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:5|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'required_with:password|same:password|min:8|max:255',
            'car' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Convert Array to String for checkbox
        $arrayToString = implode(', ', $request->input('cars'));
        $validated['car'] = $arrayToString;

        // TODO add to drivers instead of user
        // Driver::create($validated);

        User::create($validated);

        return redirect('/login')->with('success', 'Registration was successful!');
    }
}
