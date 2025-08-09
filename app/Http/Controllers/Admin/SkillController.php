<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Informasi;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = $request->input('search');

        $skills = Skill::when($query, function ($q) use ($query) {
                return $q->where('nama', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $query]);

        $informasi = Informasi::first();

        return view('pages.admin.skill.index', compact('skills', 'informasi', 'query'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $informasi = Informasi::first();

        return view('pages.admin.skill.create', compact('informasi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:100'
        ]);

        Skill::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('skill.index')->with('success', 'Skill berhasil ditambahkan!');

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
         $informasi = Informasi::first();

        return view('pages.admin.skill.edit', compact('skill','informasi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
           $request->validate([
            'nama' => 'required|string|max:100'
        ]);

        $skill->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('skill.index')->with('success', 'Skill berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Skill berhasil dihapus.');

    }
}
