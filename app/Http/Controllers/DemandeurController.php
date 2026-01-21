<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeurController extends Controller
{
    public function index()
    {
        return view('demandeur.home');
    }

    public function profil()
    {
        return view('demandeur.profil');
    }

    public function demandes()
    {
        return view('demandeur.demandes');
    }

    public function demande()
    {
        return view('demandeur.demande');
    }
}
