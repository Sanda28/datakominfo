<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-primary" href="<?= base_url(); ?>">
                    <i class="fas fa-broadcast-tower"></i> INFRATEK
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-item nav-link active" href="<?= base_url('home'); ?>">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                        <a class="nav-item nav-link" href="<?= base_url('home/peta'); ?>">
                            <i class="fas fa-map-marked-alt"></i> Peta
                        </a>
                        <a class="nav-item nav-link" href="<?= base_url('home/statistik'); ?>">
                            <i class="fas fa-chart-bar"></i> Statistik
                        </a>
                    </div>
                    <a class="btn btn-sm btn-info ms-lg-3" href="<?= base_url('autentifikasi'); ?>">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>

