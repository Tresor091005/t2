<?php

namespace App\Http\Controllers;

use App\Http\Requests\CooperativeRequest;
use App\Models\Cooperative;
use App\Models\Filiere;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperatives = Cooperative::all();
        return view('cooperatives.index', compact('cooperatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('cooperatives.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CooperativeRequest $request)
    {
        $cooperative = Cooperative::create($request->all());
        return redirect()->route('cooperatives.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cooperative $cooperative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cooperative $cooperative)
    {
        $filieres = Filiere::all();
        return view('cooperatives.edit', compact('cooperative', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CooperativeRequest $request, Cooperative $cooperative)
    {
        $cooperative->update($request->all());
        return redirect()->route('cooperatives.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        return redirect()->route('cooperatives.index');
    }
}
