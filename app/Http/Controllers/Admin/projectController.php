<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;

class projectController extends Controller
{
    public function index()
    {
        $projects = project::all(); // Semua project
        return view('pages.admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('pages.admin.project.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'link_project' => 'required|url',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFile);
            $validatedData['foto'] = $namaFile;
        }

        project::create($validatedData);

        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = project::findOrFail($id);
        return view('pages.admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = project::findOrFail($id);

        $validatedData = $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'link_project' => 'required|url',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($project->foto && file_exists(public_path('image/' . $project->foto))) {
                unlink(public_path('image/' . $project->foto));
            }

            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFile);
            $validatedData['foto'] = $namaFile;
        }

        $project->update($validatedData);

        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = project::findOrFail($id);

        // Hapus foto dari public/image
        if ($project->foto && file_exists(public_path('image/' . $project->foto))) {
            unlink(public_path('image/' . $project->foto));
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus!');
    }
}
