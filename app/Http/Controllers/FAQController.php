<?php

namespace App\Http\Controllers;

use App\Models\FAQ;

class FAQController extends Controller
{
    public function index()
    {
        return view('user.sections.faq', [
            'faqs' => FAQ::all()
        ]);
    }
}
