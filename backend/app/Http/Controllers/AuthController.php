<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données reçues depuis la requête
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role_id' => 'required|exists:roles,id', // Vérifier que le rôle existe dans la table roles
            ]);


            // Créer un nouvel utilisateur
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Enregistrer l'utilisateur dans la base de données
            $user->save();

            // Ajouter le rôle à l'utilisateur en utilisant la relation définie dans le modèle User
            $user->roles()->attach($validatedData['role_id']);

            // Créer un jeton d'authentification pour l'utilisateur
            //$token = $user->createToken('authToken')->plainTextToken;

            // Retourner une réponse avec l'utilisateur créé et le jeton d'authentification
            return response()->json(['message' => 'Utilisateur créé avec succès', 'user' => $user], 201);
            
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
            die($e);
        }
    }




    public function login(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérifier les informations d'identification de l'utilisateur
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Créer un jeton d'authentification pour l'utilisateur
        $token = $user->createToken('authToken')->plainTextToken;

        // Retourner une réponse avec l'utilisateur authentifié et le jeton d'authentification
        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function logout(Request $request)
    {
        // Révoquer tous les jetons d'authentification de l'utilisateur
        $request->user()->tokens()->delete();

        // Retourner une réponse avec un message de déconnexion réussie
        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
