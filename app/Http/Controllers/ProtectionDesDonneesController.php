<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectionDesDonneesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('protection-des-donnees.index');
    }
}
