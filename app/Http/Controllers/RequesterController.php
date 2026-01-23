<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequesterController extends Controller
{
    public function home()
    {
        return view('requester.home');
    }

    public function profile()
    {
        return view('requester.profile');
    }

    public function demands()
    {
        return view('requester.demands');
    }

    public function demand()
    {
        return view('requester.demand');
    }
}
