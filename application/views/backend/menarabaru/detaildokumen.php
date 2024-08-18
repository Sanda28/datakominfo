<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
    <div class="col-sm-12">
		    <div class="card shadow">
			    <div class="card-header">
				    <h6 class="m-0 font-weight-bold text-primary">Detail Dokumen</h6>
			    </div>
			    <div class="modal-content">
                
                <object data="<?= base_url('assets/surat/'); ?><?= $surat ?>" width="100%" height="700px"></object>
                 
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


