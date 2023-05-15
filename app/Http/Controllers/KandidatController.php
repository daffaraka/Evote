<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Pemilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KandidatController extends Controller
{
    public function index()
    {
        $kandidat = Kandidat::with('Pemilihan')->get();

        return view('kandidat.kandidat-index', compact('kandidat'));
    }


    public function create()
    {
        $pemilihan = Pemilihan::all();
        return view('kandidat.kandidat-create', compact('pemilihan'));
    }


    public function store(Request $request)
    {

        $file = $request->file('foto_kandidat');
        $fileName = $file->getClientOriginalName();
        $lokasiFile = 'Foto Kandidat';
        $file->move($lokasiFile, $request->nama_pasangan . '-' . $fileName);

        $kandidat = new Kandidat();
        $kandidat->foto_kandidat = $request->nama_pasangan . '-' . $fileName;
        $kandidat->nama_pasangan = $request->input('nama_pasangan');
        $kandidat->pemilihan_id = $request->input('pemilihan_id');
        $kandidat->nama_ketua = $request->input('nama_ketua');
        $kandidat->nama_wakil = $request->input('nama_wakil');
        $kandidat->visi = $request->input('visi');
        $kandidat->misi = $request->input('misi');
        $kandidat->program_kerja = $request->input('program_kerja');
        $kandidat->save();

        return redirect()->route('kandidat');
    }


    public function edit($id)
    {
        $kandidat = Kandidat::find($id);
        $pemilihan = Pemilihan::all();


        return view('kandidat.kandidat-edit', compact('kandidat', 'pemilihan'));
    }


    public function update($id, Request $request)
    {

        $kandidat = Kandidat::find($id);

        $file = $request->file('foto_kandidat');
        $fileName = $file->getClientOriginalName();
        $lokasiFile = 'Foto Kandidat';

        if ($request->has('foto_kandidat')) {
            if (File::exists('Foto Kandidat/' . $kandidat->foto_kandidat)) {
                File::delete('Foto Kandidat/' . $kandidat->foto_kandidat);
                $file->move($lokasiFile, $request->nama_pasangan . '-' . $fileName);
            } else {
                $file->move($lokasiFile, $request->nama_pasangan . '-' . $fileName);
            }
        }

        $kandidat->foto_kandidat = $request->nama_pasangan . '-' . $fileName;
        $kandidat->nama_pasangan = $request->input('nama_pasangan');
        $kandidat->pemilihan_id = $request->input('pemilihan_id');
        $kandidat->nama_ketua = $request->input('nama_ketua');
        $kandidat->nama_wakil = $request->input('nama_wakil');
        $kandidat->visi = $request->input('visi');
        $kandidat->misi = $request->input('misi');
        $kandidat->program_kerja = $request->input('program_kerja');
        $kandidat->save();

        return redirect()->route('kandidat');
    }


    public function show($id)
    {
        $kandidat = Kandidat::find($id);

        return view('kandidat.kandidat-show', compact('kandidat'));
    }


    public function destroy($id)
    {
        $kandidat = Kandidat::find($id);
        if ($kandidat) {
            File::delete('Foto Kandidat/' . $kandidat->foto_kandidat);
            $kandidat->delete();
        }
        return redirect()->route('kandidat');
    }
}
