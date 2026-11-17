<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = Prodi::all();
    return view('prodi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $data = $request->validate([
        'nama_prodi' => 'required|max:100'
    ]);
    Prodi::create($data);
    return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $prodi = Prodi::findOrFail($id);
    return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $prodi = Prodi::findOrFail($id);
    $data = $request->validate([
        'nama_prodi' => 'required|max:100'
    ]);
    $prodi->update($data);
    return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Prodi::findOrFail($id)->delete();

    return redirect()->route('prodi.index');
    }

}
