<section class="vh-100 bg-white">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-lg-6 d-none d-lg-block">
                <img src="<?= base_url('assets/img/menara.png') ?>" class="img-fluid" alt="Menara">
            </div>
            <div class="col-lg-6">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <h2 class="fw-bold text-uppercase text-primary">InFratek</h2>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <form class="user" method="post" action="<?= base_url('autentifikasi'); ?>">
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control form-control-lg" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember Me
                                    </label>
                                </div>
                                <a class="small text-muted" href="<?= base_url('autentifikasi/lupaPassword'); ?>">Lupa Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Masuk
                            </button>
                        </form>
                        <hr class="my-4">
                        <div class="text-center">
                            <p class="small mb-0">Belum punya akun? <a href="<?= base_url('autentifikasi/registrasi'); ?>">Daftar Member!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
