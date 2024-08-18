<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white-900 text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <div class="text-center">
              <h2 class="fw-bold mb-2 text-uppercase">Lupa Password</h2>
            </div>
            <hr>
            <hr>

            <?= $this->session->flashdata('pesan'); ?>
            <form class="user" method="post" action="<?= base_url('autentifikasi/lupaPassword'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Reset Password
              </button>
            </form>
            <hr>
            
            <div class="text-center">
                <a class="small" href="<?= base_url('autentifikasi'); ?>">Back To login</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>