<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
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
        $data['developer'] = Auth::user()->developer;

        return view('myportfolio', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $developer = Developer::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'technology' => 'required|array',
            'technology.*' => 'in:Laravel,WordPress,Vue.js,React,Bootstrap,Tailwind,Node.js,Python',
            'availability' => 'required|integer',
        ]);

        $developer->update($validatedData);

        return redirect()->route('portfolio.index')->with('status', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        //
    }
}
