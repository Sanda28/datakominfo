<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white-900 text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <div class="text-center">
              <h2 class="fw-bold mb-2 text-uppercase">Ganti Password for</h2>
              <h5><?= $this->session->userdata('reset_email') ?></h5>
            </div>
            <hr>
            <hr>

            <?= $this->session->flashdata('pesan'); ?>
            <form class="user" method="post" action="<?= base_url('autentifikasi/changepassword'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user"  id="password1" placeholder="Masukkan Password Baru" name="password1">
                <?= form_error('password1','<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user"  id="password2" placeholder="Ulangi Password Baru" name="password2">
                <?= form_error('password2','<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Ganti Password
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>