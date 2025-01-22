@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <section id="about" class="py-24 bg-gradient-to-r from-black via-gray-900 to-black text-gray-100">
        <div class="container mx-auto px-6">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <h2 class="text-5xl font-extrabold text-white leading-tight mb-4 tracking-wide">Tentang Sigma Enterprise</h2>
                <p class="text-lg md:text-xl max-w-3xl mx-auto text-gray-300 opacity-80">
                    Sigma Enterprise adalah penyedia layanan kelistrikan dan solusi teknologi informasi terkemuka,
                    berkomitmen untuk menghadirkan solusi berkinerja tinggi yang mendukung bisnis dan individu dalam
                    berkembang di era digital.
                </p>
            </div>


            <!-- Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                <!-- Image Section -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/icon.png') }}" alt="About Us Image"
                        class="rounded-3xl shadow-lg border-4 border-gray-100 w-full max-w-xl">
                </div>


                <!-- Text Section -->
                <div class="space-y-12">
                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Misi Kami</h3>
                        <p class="text-lg text-gray-300 leading-relaxed opacity-90">
                            Misi kami adalah menyediakan solusi kelistrikan dan teknologi informasi yang luar biasa, tidak
                            hanya memenuhi kebutuhan klien tetapi juga melampaui ekspektasi mereka, mendorong kesuksesan dan
                            inovasi.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Visi Kami</h3>
                        <p class="text-lg text-gray-300 leading-relaxed opacity-90">
                            Menjadi pemimpin global dalam penyediaan layanan kelistrikan dan teknologi informasi terkini,
                            menciptakan kemitraan yang berkelanjutan untuk mendorong inovasi dan pertumbuhan yang
                            berkesinambungan.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-semibold text-white mb-6">Komitmen Utama Kami</h3>
                        <ul class="space-y-4">
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Integritas:</strong> Kami menjaga standar profesionalisme dan kejujuran tertinggi
                                dalam setiap hal yang kami lakukan.
                            </li>
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Inovasi:</strong> Kami terbuka terhadap perubahan dan secara aktif mencari solusi
                                inovatif untuk meningkatkan layanan dan proses kami.
                            </li>
                            <li class="text-lg text-gray-300 opacity-80">
                                <strong>Berorientasi pada Pelanggan:</strong> Kami berfokus pada memberikan nilai terbaik
                                kepada pelanggan dengan memahami dan memenuhi kebutuhan unik mereka.
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Additional Information Section -->
            <div class="mt-24 text-center">
                <h3 class="text-3xl font-semibold text-white mb-8">Keunggulan Kami</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="space-y-4">
                        <h4 class="text-2xl font-bold text-gray-300">Layanan Terpercaya</h4>
                        <p class="text-lg text-gray-300 opacity-80">
                            Kami telah membangun reputasi yang solid dengan menyediakan layanan berkualitas tinggi, tepat
                            waktu, dan dengan biaya yang transparan.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <h4 class="text-2xl font-bold text-gray-300">Teknologi Terkini</h4>
                        <p class="text-lg text-gray-300 opacity-80">
                            Kami selalu menggunakan teknologi terbaru dalam setiap proyek, memastikan solusi yang kami
                            tawarkan selalu efisien dan inovatif.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <h4 class="text-2xl font-bold text-gray-300">Tim Profesional</h4>
                        <p class="text-lg text-gray-300 opacity-80">
                            Tim kami terdiri dari para profesional berpengalaman di bidang kelistrikan dan teknologi, siap
                            membantu klien dalam setiap langkah.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Developer Section -->
            <div class="mt-24">
                <h3 class="text-3xl font-semibold text-white mb-8 text-center">Tentang Pengembang</h3>
                <div class="text-center">
                    <img src="{{ asset('images/anonymous.jpg') }}" alt="Developer Profile"
                        class="w-32 h-32 object-cover rounded-full mx-auto mb-4 border-4 border-white shadow-xl">

                    <h4 class="text-xl text-white font-semibold">Bely Fernando</h4>
                    <p class="text-lg text-gray-300">Full Stack Developer</p>
                    <p class="mt-4 text-gray-300 leading-relaxed max-w-2xl mx-auto">
                        Halo, saya Bely Fernando, seorang pengembang web penuh waktu dengan pengalaman dalam membangun
                        solusi berbasis teknologi. Web ini adalah hasil dari dedikasi dan keterampilan saya di bidang
                        pengembangan aplikasi modern menggunakan Laravel, Tailwind CSS, dan teknologi lainnya.
                    </p>
                </div>
            </div>
            <!-- Skills and Achievements Section -->
            <div class="mt-24">
                <h3 class="text-3xl font-semibold text-white mb-8 text-center">Keahlian dan Pencapaian</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 text-center">
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Keahlian</h4>
                        <ul class="text-gray-300 mt-4 space-y-2">
                            <li>- Laravel Development</li>
                            <li>- Tailwind CSS & Bootstrap</li>
                            <li>- PHP & MySQL</li>
                            <li>- Full Stack Development</li>
                        </ul>
                    </div>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Pencapaian</h4>
                        <p class="text-gray-300 mt-4">
                            - Pengembang independen untuk Sigma Enterprise<br>
                            - 5+ proyek berhasil diselesaikan<br>
                            - Sertifikasi IT Web Development
                        </p>
                    </div>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Visi</h4>
                        <p class="text-gray-300 mt-4">
                            Membantu bisnis dan individu memanfaatkan teknologi modern melalui solusi digital berkinerja
                            tinggi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Why Choose Me Section -->
            <div class="mt-24">
                <h3 class="text-3xl font-semibold text-white mb-8 text-center">Mengapa Memilih Saya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 text-center">
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Pengalaman</h4>
                        <p class="text-gray-300 mt-4">
                            Meskipun baru 1 tahun berkarier sebagai web developer, saya telah menyelesaikan beberapa proyek
                            berbasis Laravel dan Tailwind CSS dengan hasil yang memuaskan.
                        </p>

                    </div>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Dedikasi</h4>
                        <p class="text-gray-300 mt-4">
                            Komitmen penuh terhadap kualitas dan kepuasan pelanggan.
                        </p>
                    </div>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-xl text-white font-semibold">Keahlian</h4>
                        <p class="text-gray-300 mt-4">
                            Penguasaan teknologi modern untuk menciptakan solusi inovatif.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
