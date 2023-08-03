<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Exception;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        // Valider les données 
        //try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role_id' => 'required|exists:roles,id', // Vérifier que le rôle existe 
            ]);


            // Créer un nouvel utilisateur
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Enregistrer 
            $user->save();

            // Ajouter le rôle 
            $user->roles()->attach($validatedData['role_id']);

            $admin = User::whereHas('roles', function ($query) {
                $query->where('role_id', 1);
            })->first();
    
            if ($admin) {
                $admin->notify(new NewUserNotification($user));
            }





            // Retourner une réponse avec le nouvel utilisateur créé
            return response()->json(['message' => 'Utilisateur créé avec succès', 'user' => $user], 201);
        // } catch (Exception $e) {
        //     return response()->json(['message' => $e->getMessage()], 500);
        //     die($e);
        // }
    }

    public function index()
    {
        try{
        // Récupérer tous les utilisateurs avec leurs rôles
        $users = User::with('roles')->get();

        // Retourner une réponse avec les utilisateurs récupérés
        return response()->json(['users' => $users], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
            die($e);
        }
    }


    public function show($id)
    {
        // Récupérer l'utilisateur avec l'ID donné et charger la relation roles
        $user = User::with('roles')->find($id);

        // Vérifier si l'utilisateur existe dans la base de données
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Retourner une réponse avec l'utilisateur récupéré
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        // Valider les données reçues depuis la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Récupérer l'utilisateur avec l'ID donné
        $user = User::find($id);

        // Vérifier si l'utilisateur existe dans la base de données
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Mettre à jour les informations de l'utilisateur
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Mettre à jour le rôle de l'utilisateur en utilisant la relation définie dans le modèle User
        $user->roles()->sync([$validatedData['role_id']]);

        // Retourner une réponse avec l'utilisateur mis à jour
        return response()->json(['message' => 'Utilisateur mis à jour avec succès', 'user' => $user], 200);
    }


    public function destroy($id)
    {
        // Récupérer l'utilisateur avec l'ID donné
        $user = User::find($id);

        // Vérifier si l'utilisateur existe dans la base de données
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Supprimer l'utilisateur de la base de données
        $user->delete();

        // Retourner une réponse indiquant que l'utilisateur a été supprimé avec succès
        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }
}
