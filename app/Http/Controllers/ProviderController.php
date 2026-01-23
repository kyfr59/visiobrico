<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function home()
    {
        return view('provider.home');
    }

    public function profile()
    {
        return view('provider.profile');
    }

    public function proposals()
    {
        return view('provider.proposals');
    }

    public function search()
    {
        return view('provider.search');
    }
}
