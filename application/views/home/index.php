<div class="container-fluid">
    <!-- Background Section with Overlay -->
    <div class="position-relative" style="width: 100%; height: 500px;">
        <div class="bg-dark position-absolute w-100 h-100" style="opacity: 0.6;"></div>
        <div class="d-flex align-items-center justify-content-center position-absolute w-100 h-100 text-white">
            <div class="container text-center">
                <h1 class="display-4 font-weight-bold">Infratek</h1>
                <p class="lead">Selamat datang di Aplikasi Sistem Informasi Kabupaten Bogor</p>
                <a class="btn btn-info btn-lg text-white" href="<?= base_url('home/peta'); ?>">Cek Peta Kawasan</a>
            </div>
        </div>
        <img src="<?= base_url('assets/img/beranda.jpg') ?>" class="img-fluid w-100 h-100" alt="background" style="object-fit: cover;">
    </div>

    <!-- Steps Section -->
    <section class="text-center text-dark my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <h2 class="font-weight-bold">Langkah Pengajuan Rekomendasi Menara</h2>
                    <p class="lead">Berikut adalah langkah-langkah proses pengajuan untuk penerbitan rekomendasi Menara Telekomunikasi di Kabupaten Bantul</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="text-dark py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="process__item p-4 mb-4 bg-white rounded shadow-sm h-100">
                        <h5 class="font-weight-bold">Pengajuan</h5>
                        <p>Perusahaan atau Sub Kontraktor mengajukan permohonan rekomendasi Menara dengan mengirimkan rincian data dan berkas melalui aplikasi Siszora</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process__item p-4 mb-4 bg-white rounded shadow-sm h-100">
                        <h5 class="font-weight-bold">Survei</h5>
                        <p>Pihak Dinas Kominfo akan melakukan pengecekan terhadap pengajuan dan survei ke lokasi yang sudah ditentukan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process__item p-4 mb-4 bg-white rounded shadow-sm h-100">
                        <h5 class="font-weight-bold">Penerbitan Rekomendasi</h5>
                        <p>Surat Rekomendasi akan diterbitkan apabila Rekomendasi yang diajukan memenuhi kriteria</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process__item p-4 mb-4 bg-white rounded shadow-sm h-100">
                        <h5 class="font-weight-bold">Pembangunan & Pengisian PBG</h5>
                        <p>Perusahaan atau Sub Kontraktor dapat membangun Menara dan setelah PBG (Persetujuan Bangunan Gedung) terbit, Administrator akan mengubah status menara di Aplikasi Siszora</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
