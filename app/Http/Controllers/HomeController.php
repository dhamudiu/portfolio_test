<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['technologies'] = [
            'Laravel',
            'WordPress',
            'Vue.js',
            'React',
            'Bootstrap',
            'Tailwind',
            'Node.js',
            'Python'
        ];
        $data['developers'] = Developer::all();

        return view('home', $data);
    }
}
