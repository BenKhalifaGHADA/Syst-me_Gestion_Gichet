<?php

namespace App\Http\Controllers;
use App\Models\Lieu;
use App\Models\trashType;
use App\Http\Controllers\Controller;
use App\Models\User;
//use DB;
//use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lieux = Lieu::with('trashTypes')->get();
        return view('lieux.index', compact('lieux'));
    }
    public function frontIndex()
    {
        $lieux = Lieu::all();
        return view('front-office.index', compact('lieux'));
    }
    public function frontLieu()
    {
        $lieux = Lieu::all();
        return view('front-office.lieu', compact('lieux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trashTypes = trashType::all();
        return view('lieux.create', compact('trashTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $lieu = Lieu::create([
        //     'adresse' => $request->input('adresse'),
        //     'horaires_collecte' => $request->input('horaires_collecte'),
        // ]);
        $request->validate([
            'adresse' => 'required',
            'horaires_collecte' => 'required',
            'trash_types' => 'array', // Le champ trash_types doit être un tableau
        ]);

        $lieu = new Lieu([
            'adresse' => $request->input('adresse'),
            'horaires_collecte' => $request->input('horaires_collecte'),
        ]);

        $lieu->save();

        // Attachement des types de déchets sélectionnés
        $selectedTrashTypes = $request->input('trash_types', []);
        $lieu->trashTypes()->attach($selectedTrashTypes);

        return redirect()->route('lieux.index')->with('success', 'Lieu créé avec succès.');

        // $lieu->trashTypes()->attach($request->input('trashTypes'));
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
     *
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lieu = Lieu::findOrFail($id);
        $trashTypes = TrashType::all(); // Récupérer tous les types de déchets

        return view('lieux.edit', compact('lieu', 'trashTypes'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Http\Response
     */
    public function customUpdate(Request $request, Lieu $lieu)
    {
        $request->validate([
            'adresse' => 'required',
            'horaires_collecte' => 'required',
            'trash_types' => 'array',
        ]);

        // Mettre à jour les autres champs du lieu
        $lieu->adresse = $request->input('adresse');
        $lieu->horaires_collecte = $request->input('horaires_collecte');
        $lieu->save();

        // Mettre à jour les types de déchets associés au lieu
        $selectedTrashTypes = $request->input('trash_types', []);
        $lieu->trashTypes()->sync($selectedTrashTypes);

        return redirect()->route('lieux.index')->with('success', 'Lieu mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lieu $lieu)
    {
        $lieu->trashTypes()->detach();
        $lieu->delete();

        return redirect()->route('lieux.index')->with('success', 'Lieu supprimé avec succès.');
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////

    public function showLieuxFront()
    {
        $lieux = Lieu::all();
        return view('front-office.lieux', compact('lieux'));
    }
}
