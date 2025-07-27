<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio | {{ $informasi->nama_panggilan ?? 'Kosong' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">
    <header class="bg-gray-900/80 backdrop-blur-sm fixed top-0 left-0 right-0 z-50 shadow" data-aos="fade-down">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#home" class="text-2xl font-bold text-white">{{ $informasi->nama_panggilan ?? 'Kosong' }}</a>
            <nav class="hidden md:flex space-x-6">
                <a href="#home" class="hover:text-cyan-400 transition">Home</a>
                <a href="#about" class="hover:text-cyan-400 transition">Tentang</a>
                <a href="#portfolio" class="hover:text-cyan-400 transition">Portofolio</a>
                <a href="#contact" class="hover:text-cyan-400 transition">Kontak</a>
            </nav>
        </div>
    </header>

    <main class="pt-24">
        <!-- Hero -->
        <section id="home" class="min-h-screen flex items-center justify-center text-center bg-cover bg-center" style="background-image: linear-gradient(rgba(17,24,39,0.8), rgba(17,24,39,0.9)), url('https://images.unsplash.com/photo-1534972195531-d756b9bfa9f2?q=80&w=2070&auto=format&fit=crop');">
            <div class="container px-6" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold text-white">
                    Halo, saya <span class="text-cyan-400">{{ $informasi->nama_lengkap ?? 'Tanpa Nama' }}</span>
                </h1>
                <p class="text-lg text-gray-300 mt-4">{{ $informasi->pekerjaan ?? 'Tidak bekerja' }}</p>
                <a href="#portfolio" class="mt-8 inline-block bg-cyan-500 text-white font-semibold py-3 px-8 rounded-full hover:bg-cyan-600 transition-transform transform hover:scale-105">Lihat Karya Saya</a>
            </div>
        </section>

        <!-- Tentang Saya -->
        <section id="about" class="py-20">
            <div class="container px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-bold">Tentang Saya</h2>
                    <div class="w-20 h-1 bg-cyan-400 mx-auto mt-2"></div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/3" data-aos="fade-right">
                        <img src="{{ !empty($informasi?->foto) ? asset('image/' . $informasi->foto) : 'https://via.placeholder.com/200' }}" alt="Foto Profil" class="rounded-full shadow-xl mx-auto w-48 h-48 object-cover">
                    </div>
                    <div class="w-full md:w-2/3" data-aos="fade-left">
                        <div class="mb-4 flex flex-wrap gap-2">
                            <span class="bg-blue-800 text-white text-sm font-semibold px-3 py-1 rounded-full shadow">{{ $informasi->badge ?? 'Badge Kosong' }}</span>
                            <span class="bg-gray-200 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">{{ $informasi->lokasi ?? 'Lokasi Kosong' }}</span>
                        </div>
                        <p class="text-gray-300 leading-relaxed mb-6">{{ $informasi->deskripsi ?? 'Deskripsi kosong' }}</p>
                        <h3 class="text-2xl font-semibold mb-3">Keahlian Saya</h3>
                        <div class="flex flex-wrap gap-3">
                            @forelse ($skills as $item)
                                <span class="bg-gray-100 text-gray-700 text-sm font-medium px-4 py-2 rounded-full transition hover:bg-blue-800 hover:text-white">{{ $item->nama }}</span>
                            @empty
                                <p class="text-gray-400">Belum ada skill.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="portfolio" class="py-20 bg-gray-800">
            <div class="container px-6">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl font-bold text-white">Portofolio Proyek</h2>
                    <div class="w-20 h-1 bg-cyan-400 mx-auto mt-2"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($project as $item)
                        <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg group" data-aos="fade-up">
                            <img src="{{ asset('image/' . $item->foto) }}" alt="Proyek" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300" />
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $item->nama_project }}</h3>
                                <p class="text-gray-400 mb-4">{{ $item->deskripsi }}</p>
                                <a href="{{ $item->link_project }}" class="text-cyan-400 hover:underline">Lihat Detail</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-400 col-span-full text-center">Belum ada proyek ditambahkan.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Kontak -->
        <section id="contact" class="py-20">
            <div class="container px-6 text-center" data-aos="zoom-in">
                <h2 class="text-4xl font-bold text-white">Hubungi Saya</h2>
                <div class="w-20 h-1 bg-cyan-400 mx-auto mt-2"></div>
                <p class="text-gray-300 mt-6 max-w-xl mx-auto">
                    Tertarik untuk bekerja sama atau berdiskusi? Hubungi saya langsung melalui WhatsApp.
                </p>
                <a href="https://wa.me/{{ $informasi->no_hp ?? 'tidak ada' }}" class="mt-8 inline-block bg-cyan-500 text-white font-bold py-3 px-8 rounded-full hover:bg-cyan-600 transition-transform transform hover:scale-105">Chat via WhatsApp</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 py-6 mt-10">
        <div class="text-center text-gray-400">
            <p>&copy; {{ date('Y') }} {{ $informasi->nama_panggilan ?? 'Kosong' }}. Dibuat dengan Laravel & Tailwind CSS.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: false });
    </script>
</body>
</html>
