<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patronyme;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $key = trim($request->input('q'));

        $users = User::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('email', 'like', "%{$key}%")
            ->orderByDesc('created_at')
            ->get();

        $patronymes = Patronyme::query()
                        ->where('designation', 'like', "%{$key}%")
                        ->orderByDesc('designation')
                        ->get();

        return view('recherche.resultat',[
            'key' => $key,
            'users' => $users,
            'patronymes' => $patronymes,
        ]);
    }
}
