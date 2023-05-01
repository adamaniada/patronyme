<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patronyme;

class PatronymeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->input('trier') == 'date_de_creation_moins_recentes')
        {
            $patronymes = Patronyme::join('users', 'patronymes.user_id', 'users.id')
                        ->select('patronymes.*', 'users.name')
                        ->orderBy('created_at', 'asc')
                        ->paginate(10);
        }elseif ($request->input('trier') == 'date_de_creation_recentes') {
            $patronymes = Patronyme::join('users', 'patronymes.user_id', 'users.id')
                        ->select('patronymes.*', 'users.name')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }elseif ($request->input('trier') == 'Nom_de_famille_A-Z') {
            $patronymes = Patronyme::join('users', 'patronymes.user_id', 'users.id')
                        ->select('patronymes.*', 'users.*')
                        ->orderBy('designation', 'asc')
                        ->paginate(10);
        }elseif ($request->input('trier') == 'Nom_de_famille_Z-A') {
            $patronymes = Patronyme::join('users', 'patronymes.user_id', 'users.id')
                        ->select('patronymes.*', 'users.*')
                        ->orderBy('designation', 'desc')
                        ->paginate(10);
        } else {
            $patronymes = Patronyme::join('users', 'patronymes.user_id', 'users.id')
                        ->select('patronymes.*', 'users.name')
                        ->orderByDesc('created_at')
                        ->paginate(10);
        }

        return view('patronyme.index', compact('patronymes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patronyme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $designation = strtoupper(trim($request->input('designation')));

        if (Patronyme::where('designation', '=', $designation)->exists())
        {
            return redirect()->back()->with('error', 'Patronyme existe deja');
        }else {
            $patronyme = new Patronyme();
            $patronyme->user_id = Auth::user()->id;
            $patronyme->designation = $designation;
            $patronyme->ethnie = $request->input('ethnie');
            $patronyme->origin = $request->input('origin');
            $patronyme->histoire = $request->input('histoire');
            $patronyme->save();
        }

        return redirect()->route('patronyme')->with('status', 'Patronyme publié avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $designation)
    {
        if ((Patronyme::where('designation', '=', $designation)->exists()) == false)
        {
            return redirect()->back()->with('error', 'Patronyme non trouvé');
        }else{
            $patronyme = Patronyme::findOrFail(Patronyme::where('designation', '=', $designation)->first()->id);
        }
        
        return view('patronyme.show', compact('patronyme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patronyme = Patronyme::find($id);

        return view('patronyme.edit', compact('patronyme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patronyme = Patronyme::find($id);
        $patronyme->user_id = Auth::user()->id;
        $patronyme->designation = $request->input('designation');
        $patronyme->ethnie = $request->input('ethnie');
        $patronyme->origin = $request->input('origin');
        $patronyme->histoire = $request->input('histoire');
        $patronyme->updated_at = now();
        $patronyme->update();

        return redirect()->route('patronyme')->with('status', 'Patronyme mis a jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patronyme = Patronyme::find($id);
        $patronyme->delete();

        return redirect()->route('patronyme')->with('status', 'Patronyme supprimer avec success');
    }
}
