<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereRequest;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereRequest $request)
    {
        $filiere = Filiere::create($request->all());
        return redirect()->route('filieres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiliereRequest $request, Filiere $filiere)
    {
        $filiere->update($request->all());
        return redirect()->route('filieres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index');
    }
}
