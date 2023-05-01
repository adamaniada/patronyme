<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patronyme;

class AcceuilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patronymes = Patronyme::orderByDesc('designation')->paginate(10);

        return view('welcome', compact('patronymes'));
    }
}
