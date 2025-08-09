<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class informasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $informasi = Informasi::first();

        if (!$informasi) {
            return redirect()->route('informasi.create');
        }

        return view('pages.admin.informasi.index', compact('informasi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.informasi.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nama_panggilan' => 'required|string',
            'pekerjaan' => 'required|string',
            'badge' => 'required|string',
            'lokasi' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'required|string',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $informasi = new Informasi();
        $informasi->nama_lengkap = $request->nama_lengkap;
        $informasi->nama_panggilan = $request->nama_panggilan;
        $informasi->pekerjaan = $request->pekerjaan;
        $informasi->badge = $request->badge;
        $informasi->lokasi = $request->lokasi;
        $informasi->email = $request->email;
        $informasi->no_hp = $request->no_hp;
        $informasi->status = $request->status;
        $informasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFoto);
            $informasi->foto = $namaFoto;
        }
         $informasi->save();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.');



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
    public function edit(string $id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('pages.admin.informasi.edit', compact('informasi')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $informasi = Informasi::findOrFail($id);

            $request->validate([
                'nama_lengkap' => 'required|string',
                'nama_panggilan' => 'required|string',
                'pekerjaan' => 'required|string',
                'badge' => 'required|string',
                'lokasi' => 'required|string',
                'status' => 'required|string',
                'email' => 'required|string',
                'no_hp' => 'required|string',
                'deskripsi' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $informasi->nama_lengkap = $request->nama_lengkap;
            $informasi->nama_panggilan = $request->nama_panggilan;
            $informasi->pekerjaan = $request->pekerjaan;
            $informasi->badge = $request->badge;
            $informasi->email = $request->email;
            $informasi->no_hp = $request->no_hp;
            $informasi->lokasi = $request->lokasi;
            $informasi->status = $request->status;
            $informasi->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $namaFoto = time() . '_' . $foto->getClientOriginalName();
                $foto->move(public_path('image'), $namaFoto);
                $informasi->foto = $namaFoto;
            }

            
            $informasi->save();

            return redirect()->back()->with('success', 'Informasi berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
