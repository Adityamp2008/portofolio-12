<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Aditya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body class="bg-body-tertiary">

    <div class="container my-5 py-5">
        
        <section id="intro" class="mb-5 bg-dark text-white rounded-4 shadow-lg overflow-hidden py-5 px-4" data-aos="fade-up" data-aos-duration="1000">
            <div class="row align-items-center g-5">
                <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                    <img 
                        src="{{ !empty($informasi?->foto) ? asset('image/' . $informasi->foto) : 'https://via.placeholder.com/200' }}"
                        class="rounded-circle mx-auto d-block shadow-sm"
                        style="width: 100%; max-width: 250px; height: auto; aspect-ratio: 1 / 1; object-fit: cover;" 
                        alt="Foto Profil">
                </div>
                <div class="col-md-8 text-center text-md-start" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
                    <h1 class="fs-2 fw-bold mb-1">Halo, saya {{ $informasi->nama_panggilan ?? 'tidak ada nama' }}</h1>
                    <h2 class="fs-3 fw-normal mb-2">{{ $informasi->nama_lengkap ?? 'Nama tidak tersedia' }}</h2>
                    <p class="h4 fw-light text-white-75">{{ $informasi->pekerjaan ?? 'ngangur'}}</p>
                    <p class="text-muted"><i class="bi bi-geo-alt-fill me-1"></i>{{ $informasi->lokasi ?? 'Tidak ada lokasi'}}</p>
                    <p class="text-muted mb-1"><i class="bi bi-mortarboard-fill me-1"></i>{{ $informasi->status ?? 'Tidak ada status'}}</p>
                    <span class="badge bg-primary">{{ $informasi->badge ?? 'Tidak ada badge' }}</span>
                    <p class="lead mt-4">{{ $informasi->deskripsi ?? 'Deskripsi belum diisi' }}</p>
                    <a href="#projects" class="btn btn-outline-primary btn-lg mt-4 shadow-sm">Lihat Projek Saya <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </section>

        <hr class="my-5 border-secondary opacity-25">

        <section id="projects" class="py-5">
            <h2 class="text-center fw-bold mb-5 display-5" data-aos="fade-up">Projek Terbaru</h2>

            {{-- bagian ini akan menampilkan projek terbaru --}}

          <div class="container my-5">
    <div class="row gy-4 justify-content-center">
        @forelse ($project as $index => $project)
            <div class="col-md-6 col-lg-4 d-flex"
                 data-aos="fade-up"
                 data-aos-delay="{{ 100 * $index }}"> 
                <div class="card flex-fill bg-body-secondary shadow-sm border-0">
                    <img src="{{ asset('image/' . $project->foto) }}" 
                         class="card-img-top rounded-top" 
                         alt="Thumbnail Projek" 
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-semibold text-primary fs-5">
                            {{ $project->nama_project ?? 'nga ada data' }}
                        </h5>
                        <p class="card-text text-body-secondary mt-2" style="min-height: 80px;">
                            {{ Str::limit($project->deskripsi, 100) ?? 'nga ada data' }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ $project->link_project ?? '#' }}" 
                               class="btn btn-primary mt-3 w-100 shadow-sm" 
                               target="_blank">
                                Lihat Detail 
                                <i class="bi bi-box-arrow-up-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center" data-aos="fade-up">
                <div class="alert alert-warning">
                    Belum ada project yang ditambahkan.
                </div>
            </div>
        @endforelse
    </div>
</div>

            </div>
        </section>

        <hr class="my-5 border-secondary opacity-25">

        <section id="skills" class="py-5">
    <h2 class="text-center fw-bold mb-5 display-5" data-aos="fade-up">Bahasa & Keahlian</h2>
    <div class="container">
        <div class="row justify-content-center text-center">
            @forelse ($skills as $index => $skill)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="{{ 100 * $index }}">
                    <img src="{{ $skill->logo_url }}" alt="{{ $skill->nama }}" class="img-fluid mb-2" style="max-height: 60px;">
                    <div class="text-white-75 fw-medium small">{{ $skill->nama }}</div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-secondary">Belum ada skill yang ditambahkan.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

    </div>

    <footer class="text-center py-5 border-top bg-dark text-white-50">
        <div class="container">
             <div class="d-flex justify-content-center gap-4 mb-4">
                <a href="https://github.com/Adityamp2008" class="link-light fs-3 opacity-75-hover"><i class="bi bi-github"></i></a>
                <a href="https://instagram.com/Adityamp.1" class="link-light fs-3 opacity-75-hover"><i class="bi bi-instagram"></i></a>
                <a href="https://wa.me/6289501960962" class="link-light fs-3 opacity-75-hover"><i class="bi bi-whatsapp"></i></a>
            </div>
            <p class="mb-0">&copy; 2025 {{ $informasi->nama_panggilan}}. Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> dan Harapan bersama dia.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false, /* Animate only once when elements enter viewport */
            duration: 900, /* Slightly longer duration for smoother feel */
            offset: 80, /* Adjust offset for earlier or later animation trigger */
            easing: 'ease-out-quad', /* Smoother animation curve */
        });
    </script>
</body>
</html>