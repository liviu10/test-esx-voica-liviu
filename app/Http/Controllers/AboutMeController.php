<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AboutMeController extends Controller
{
    /**
     * Display the "About Me" page with the authenticated user's information.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('AboutMe', [
            'user' => Auth::user(),
        ]);
    }
}
