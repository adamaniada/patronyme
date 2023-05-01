<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patronyme;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patronymes = Patronyme::orderByDesc('designation')->paginate(10);

        return view('welcome', compact('patronymes'));
    }
}
