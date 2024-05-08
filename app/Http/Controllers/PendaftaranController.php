<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use App\Models\Pendaftaran;
use App\Models\Pasien;
use Illuminate\View\View;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaran.index', ['pendaftaran'=>pendaftaran::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $pasiens = Pasien::all();
        return view('pendaftaran.create', compact('pasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
        // 'idDaftar' => 'required',
        'noRekapMedis' => 'required',
        'namaLengkap'=> 'required',
        'tempatLahir'=> 'required',
        'tanggalLahir'=> 'required',
        'jekel'=> 'required',
        'tanggalKunjungan'=> 'required',
        'asalRujukan'=> 'required',
        'poliTujuan'=> 'required',
        'dokter'=> 'required',
        'pekerjaan'=> 'required',
        'noHp'=> 'required',
        'agama'=> 'required',
        'kewarganegaraan'=> 'required',
    ]);

    // dd($validatedData);
    Pendaftaran::create($validatedData);
    return redirect('pendaftaran')->with('flash_message', 'Pendaftaran Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftaran = pendaftaran::find($id);
        return view('pendaftaran.show')->with('pendaftaran', $pendaftaran);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.edit')->with('pendaftaran', $pendaftaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $input = $request->all();
        $pendaftaran->update($input);
        return redirect('pendaftaran')->with('flash_message', 'pendaftaran Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pendaftaran::destroy($id);
        return redirect('pendaftaran')->with('flash_message', 'pendaftaran deleted!');
    }
}
