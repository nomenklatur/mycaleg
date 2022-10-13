<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partai', [
            'title' => 'Partai',
            'parties' => Party::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partai_input', [
            'title' => 'Input'
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
            'nama' => 'required|max:10',
            'kepanjangan' => 'required|max:50',
            'gambar' => 'image|file|max:1024'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('logo-partai');
        }

        $validatedData['uri'] = Str::random(50);

        Party::create($validatedData);
        return redirect('/user/parties')->with('partai_success', 'Partai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        return view('partai_edit', [
            'title' => 'Ubah',
            'partai' => $party
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:10',
            'kepanjangan' => 'required|max:50',
            'gambar' => 'image|file|max:5000'
        ]);

        if ($request->file('gambar')) {
            if ($party->gambar != null){
                Storage::delete($party->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('logo-partai');
        }

        $validatedData['uri'] = Str::random(50);

        Party::where('id', $party->id)->update($validatedData);
        return redirect('/user/parties')->with('update_partai_success', 'Partai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        Storage::delete($party->gambar);
        Party::destroy('id', $party->id);
        return redirect('/user/parties')->with('delete_partai_success', 'Partai berhasil dihapus');
    }
}
