<?php
    
namespace App\Http\Controllers;
    
use App\Models\trashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
    
class trashTypeController extends Controller
{ 
//     protected function validateTrashType($request)
// {
//     return $request->validate([
//         'trashType' => [
//             'required',
//             Rule::unique('trash_type')->where(function ($query) use ($request) {
//                 return $query->where('name', $request->trashType);
//             }),
//         ],
//     ], [
//         'trashType.unique' => 'Ce type de déchets existe déjà dans la base de données.',
//     ]);
// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:trashType-list|trashType-create|trashType-edit|trashType-delete', ['only' => ['index','show']]);
         $this->middleware('permission:trashType-create', ['only' => ['create','store']]);
         $this->middleware('permission:trashType-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:trashType-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashTypes = trashType::latest()->paginate(5);
        //$trashType = TrashType::paginate(10);
        //return view('trashType.index', compact('trashType'));
        return view('trashType.index',compact('trashTypes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function frontTrash()
    {
        $trashTypes = trashType::all();
        return view('front-office.type', compact('trashTypes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trashType.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'name' => 'required'
        // ]);
        //$this->validateTrashType($request);
    
        // trashType::create($request->all());
    
        // return redirect()->route('trashType.index')->with('success','Trash Type created successfully.');

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:trash_type,name'],
        ]);

        // Si l'utilisateur a choisi "Other" dans le sélecteur, vérifiez le champ "other_name"
        if ($request->name === 'Other') {
            $request->validate([
                'other_name' => ['required', 'string', 'max:255', 'unique:trash_type,name'],
            ]);

            // Si la validation réussit, utilisez "other_name" pour sauvegarder le nouveau type de déchet
            $trashType = TrashType::create(['name' => $request->other_name]);
        } else {
            // Si la validation réussit, utilisez "name" pour sauvegarder le nouveau type de déchet
            $trashType = TrashType::create(['name' => $request->name]);
        }

        return redirect()->route('trashType.index')
            ->with('success', 'Trash Type created successfully.');
            

        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\trashType  $product
     * @return \Illuminate\Http\Response
     */
    public function show(trashType $trashType)
    {
        return view('trashType.show',compact('trashType'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\trashType  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(trashType $trashType)
    {
        return view('trashType.edit',compact('trashType'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trashType  $trashType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trashType $trashType)
    {
        //  request()->validate([
        //     'name' => 'required',
        // ]);
    
        //$trashType->update($request->all());

        //////////////////////
        //Valider les données du formulaire
        // $request->validate([
        //     'name' => 'required|in:Plastique,Verre,Metaux,Other',
        //     'other_name' => 'required_if:name,Other|unique:trash_type,name',
        //     Rule::unique('trash_type')->ignore($trashType->id),
        // ], [
        //     'name.required' => 'The Trash Type field is required.',
        //     'name.in' => 'Please select a valid Trash Type.',
        //     'name.unique' => 'The selected Trash Type is already in use.',
        //     'other_name.required_if' => 'The Other Trash Type field is required when selecting Other.',
        //     'other_name.unique' => 'The Other Trash Type is already in use.',
        // ]);
        //////////////////////////

        // Valider les données du formulaire
        $request->validate([
            'name' => [
                'required',
                'in:Plastique,Verre,Metaux,Other',
                function ($attribute, $value, $fail) use ($request, $trashType) {
                    if ($value === 'Other') {
                        // Si le TrashType sélectionné est "Other", vérifier que le champ "other_name" est renseigné
                        if (!$request->filled('other_name')) {
                            return $fail('The Other Trash Type field is required when selecting Other.');
                        }

                        // Vérifier que le TrashType "Other" n'existe pas déjà dans la base de données
                        $otherTrashTypeExists = TrashType::where('name', $request->other_name)->exists();
                        if ($otherTrashTypeExists) {
                            return $fail('The Other Trash Type is already in use.');
                        }
                    } else {
                        // Vérifier que le TrashType sélectionné n'existe pas déjà dans la base de données (à l'exception du TrashType actuel en cours de mise à jour)
                        $trashTypeExists = TrashType::where('name', $value)->where('id', '!=', $trashType->id)->exists();
                        if ($trashTypeExists) {
                            return $fail('The selected Trash Type is already in use.');
                        }
                    }
                },
            ],
            'other_name' => 'required_if:name,Other',
        ], [
            'name.required' => 'The Trash Type field is required.',
            'name.in' => 'Please select a valid Trash Type.',
            'other_name.required_if' => 'The Other Trash Type field is required when selecting Other.',
        ]);

        // Mettre à jour le TrashType
        if ($request->name === 'Other') {
            $trashType->name = $request->other_name;
        } else {
            $trashType->name = $request->name;
        }

        $trashType->save();
    
        return redirect()->route('trashType.index')
                        ->with('success','Trash Type updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trashType  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(trashType $trashType)
    {
        $trashType->delete();
    
        return redirect()->route('trashType.index')
                        ->with('success','Trash Type deleted successfully');
    }
}