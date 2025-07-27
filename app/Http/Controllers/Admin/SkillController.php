<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Tampilkan semua data skill.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('pages.admin.skill.index', compact('skills'));
    }

    /**
     * Tampilkan form tambah skill.
     */
    public function create()
    {
        return view('pages.admin.skill.create');
    }

    /**
     * Simpan data skill baru.
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

    public function show($id)
    {
        //
    }

    /**
     * Tampilkan form edit skill.
     */
    public function edit(Skill $skill)
    {
        return view('pages.admin.skill.edit', compact('skill'));
    }

    /**
     * Update data skill.
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
     * Hapus skill.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Skill berhasil dihapus.');
    }
}
