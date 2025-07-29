<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Informasi;

class SkillController extends Controller
{
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

    public function create()
    {
        $informasi = Informasi::first();

        return view('pages.admin.skill.create', compact('informasi'));
    }


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

    public function show($id)
    {
        //
    }

    public function edit(Skill $skill)
    {
        $informasi = Informasi::first();

        return view('pages.admin.skill.edit', compact('skill','informasi'));
    }

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

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Skill berhasil dihapus.');
    }
}
