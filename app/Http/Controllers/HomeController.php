<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.sections.home', [
            'campaigns' => Campaign::open()->latest()->withDonationsAmount()->limit(8)->get(),
        ]);
    }
}
