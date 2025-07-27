@extends('layouts.app')
@section('title', 'Data Project')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Project</h4>
                <a href="{{ route('project.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Project
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Project</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Link Project</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($project->foto)
                                        <img src="{{ asset('image/' . $project->foto) }}" alt="{{ $project->nama_project }}" class="img-fluid rounded" style="width: 120px; height: 80px; object-fit: cover;">
                                    @else
                                        <img src="https://placehold.co/120x80/eef2f7/8e9ab3?text=No+Image" alt="No Image" class="img-fluid rounded" style="width: 120px; height: 80px; object-fit: cover;">
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $project->nama_project }}</td>
                                <td>{{ Str::limit($project->deskripsi, 100) }}</td>
                                <td>
                                    <a href="{{ $project->link_project }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="bi bi-link-45deg"></i> Lihat Project
                                    </a>
                                </td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('project.destroy', $project->id) }}" method="POST">
                                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="alert alert-danger">
                                        Data project belum tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
