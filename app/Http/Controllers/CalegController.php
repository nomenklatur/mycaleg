<?php

namespace App\Http\Controllers;

use App\Models\Caleg;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CalegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caleg_input', [
            'title' => 'Input',
            'partai' => Party::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'tanggal_lahir' => 'required',
            'visi' => 'required|max:255',
            'misi' => 'required|max:255',
            'party_id' => 'required',
            'dapil_id' => 'required',
            'pendidikan' => 'required',
            'penghasilan' => 'required',
            'pengalaman' => 'required',
            'keanggotaan' => 'required',
            'kekayaan' => 'required',
        ]);
        $validatedData['uri'] = Str::random(40);
        Caleg::create($validatedData);
        return redirect('/caleg')->with('caleg_success', 'Calon legislatif berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caleg  $caleg
     * @return \Illuminate\Http\Response
     */
    public function show(Caleg $caleg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caleg  $caleg
     * @return \Illuminate\Http\Response
     */
    public function edit(Caleg $caleg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caleg  $caleg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caleg $caleg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caleg  $caleg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caleg $caleg)
    {
        //
    }
}
