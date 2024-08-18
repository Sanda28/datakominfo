<?php
class Menara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }
    public function index()
    {
        $data['judul'] = 'Data Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menara'] = $this->ModelMenara->lihat_menara();
        $data['desa'] = $this->ModelMenara->getDesa()->result_array();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan ORDER BY kecamatan ASC")->result_array();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|min_length[3]', [
            'required' => 'Nama Perusahaan harus diisi',
            'min_length' => 'Nama Perusahaan terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_site', 'Id site', 'required|min_length[3]', [
            'required' => 'Id site harus diisi',
            'min_length' => 'Id site terlalu pendek'
        ]);
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|min_length[3]', [
            'required' => 'Site Name harus diisi',
            'min_length' => 'Site Name terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required|min_length[3]', [
            'required' => 'Kecamatan harus diisi',
            'min_length' => 'Kecamatan terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_desa', 'Desa', 'required|min_length[3]', [
            'required' => 'Desa harus diisi',
            'min_length' => 'Desa terlalu pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[3]', [
            'required' => 'Nama Perusahaan harus diisi',
            'min_length' => 'Nama Perusahaan terlalu pendek'
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|min_length[3]', [
            'required' => 'Lat  harus diisi',
            'min_length' => 'Lat  terlalu pendek'
        ]);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|min_length[3]', [
            'required' => 'Long harus diisi',
            'min_length' => 'Long terlalu pendek'
        ]); 
        $this->form_validation->set_rules('tinggi_menara', 'Tinggi Menara', 'required', [
            'required' => 'Tinggi Menara  harus diisi',
            
        ]);
        
       
        $this->form_validation->set_rules('imb', 'IMB', 'required', [
            'required' => 'IMB  harus diisi',
            
        ]);
        
        $this->form_validation->set_rules('rekom', 'Rekom', 'required', [
            'required' => 'Rekom harus diisi',
        ]);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/menara/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('backend/menara/menara', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'id_site' => $this->input->post('id_site', true),
                'site_name' => $this->input->post('site_name', true),
                'id_desa' => $this->input->post('id_desa', true),
                'id_kecamatan' => $this->input->post('id_kecamatan', true),
                'alamat' => $this->input->post('alamat', true),
                'latitude' => $this->input->post('latitude', true),
                'longitude' => $this->input->post('longitude', true),
                'tinggi_menara' => $this->input->post('tinggi_menara', true),
                'imb' => $this->input->post('imb', true),
                'rekom' => $this->input->post('rekom', true),
                'tahun_rekom' => $this->input->post('tahun_rekom', true),
                'image' => $gambar,
            ];
            $this->ModelMenara->simpanMenara($data);
            redirect('menara');
        } 
    }
    public function load_desa()
    {
        $judul = 'Data Menara BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $kecamatan = $this->input->post('kecamatan');
        $data =$this->db->query("SELECT * FROM desa WHERE id_kecamatan='$kecamatan' ORDER BY desa ASC")->result_array();

        echo '<option value="0">-Pilih Desa/Kelurahan-</option>';
        foreach($data as $key => $k){
            echo "<option value=".$k['id_desa'].">".$k['desa']."</option>";
        }
    }
    public function load_desaa()
    {
        $judul = 'Data Menara BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_kecamatan = $this->input->post('id_kecamatan');
        $data =$this->db->query("SELECT * FROM desa WHERE id_kecamatan='$id_kecamatan' ORDER BY desa ASC")->result_array();

        echo '<option value="0">-Pilih Desa/Kelurahan-</option>';
        foreach($data as $key => $k){
            echo "<option value=".$k['id_desa'].">".$k['desa']."</option>";
        }
    }
    public function desa_load()
    {
        $judul = 'Data Menara BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_kecamatan = $this->input->post('id_kecamatan');
        $data =$this->db->query("SELECT * FROM desa WHERE id_kecamatan='$id_kecamatan' ORDER BY desa ASC")->result_array();

        foreach($data as $key => $k){
            echo "<option value=".$k['id_desa'].">".$k['desa']."</option>";
        }
    }
    public function load_menaraa()
    {
        $judul= 'Data Menara BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $kecamatan = $_GET['kecamatan'];
        
        if ($kecamatan == 0) {
            $kecamatan = $this->db->query("SELECT *
            FROM menara
            INNER JOIN desa ON desa.id_desa=menara.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan")->result_array();
        }
        else{
            $data = $this->db->query("SELECT *
            FROM menara
            INNER JOIN desa ON desa.id_desa=menara.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan
            WHERE menara.id_kecamatan='$kecamatan'")->result_array();
        }
        if  (!empty($data)){
            $a = 1; foreach ($data as $k) { ?>
                <tr>
                <td><?php echo $a++ ?></td>
                <td> <?= $k['nama_perusahaan']; ?> </td>
                <td> <?= $k['kecamatan']; ?> </td>
                <td> <?= $k['desa']; ?> </td>
                <td>
                <a href="<?= base_url('menara/ubahmenara/') . $k['id_menara']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                <a href="<?= base_url('menara/detailmenara/') . $k['id_menara']; ?>" class="badge badge-search"><i class="fas fw fa-search"></i> Detail</a>
                <a href="<?= base_url('menara/hapusmenara/') . $k['id_menara']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['nama_perusahaan']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
                </tr>   
            <?php } ?> <?php
        }
        else 
        {
            ?>
            <tr><td><center><span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong</span></center></td></tr>
            <?php
        }  
    }
    public function load_menara()
    {
        $judul= 'Data Menara BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $desa = $_GET['desa'];
        
        if ($desa == 0) {
            $data = $this->db->query("SELECT *
            FROM menara
            INNER JOIN desa ON desa.id_desa=menara.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan")->result_array();
        }
        else{
            $data = $this->db->query("SELECT *
            FROM menara
            INNER JOIN desa ON desa.id_desa=menara.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan
            WHERE menara.id_desa='$desa'")->result_array();
        }
        if  (!empty($data)){
            $a = 1; foreach ($data as $k) { ?>
                <tr>
                <td><?php echo $a++ ?></td>
                <td> <?= $k['nama_perusahaan']; ?> </td>
                <td> <?= $k['kecamatan']; ?> </td>
                <td> <?= $k['desa']; ?> </td>
                <td>
                <a href="<?= base_url('menara/ubahmenara/') . $k['id_menara']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                <a href="<?= base_url('menara/detailmenara/') . $k['id_menara']; ?>" class="badge badge-search"><i class="fas fw fa-search"></i> Detail</a>
                <a href="<?= base_url('menara/hapusmenara/') . $k['id_menara']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['nama_perusahaan']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
                </tr>   
            <?php } ?> <?php
        }
        else 
        {
            ?>
            <tr><td><center><span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data Masih Kosong</span></center></td></tr>
            <?php
        }  
    }
    public function hapusMenara()
    {
        $where = ['id_menara' => $this->uri->segment(3)];
        

        $this->ModelMenara->hapusMenara($where);
        
        redirect('menara');
    }
    public function detailMenara()
    {
        $data['judul'] = 'Detail Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $data['menara'] = $this->ModelMenara->menaraWhere(['id_menara' => $this->uri->segment(3)])->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/menara/detail_menara', $data);
        $this->load->view('templates/footer');
    }

    public function ubahMenara()
    {
        $data['judul'] = 'Data Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menara'] = $this->ModelMenara->join_menara(['id_menara' => $this->uri->segment(3)])->result_array();
        $data['desa'] = $this->ModelMenara->getDesa()->result_array();
        $data['kecamatan'] = $this->ModelMenara->getKecamatan()->result_array();

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|min_length[3]', [
            'required' => 'Nama Perusahaan harus diisi',
            'min_length' => 'Nama Perusahaan terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_site', 'Id site', 'required|min_length[3]', [
            'required' => 'Id site harus diisi',
            'min_length' => 'Id site terlalu pendek'
        ]);
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|min_length[3]', [
            'required' => 'Site Name harus diisi',
            'min_length' => 'Site Name terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_desa', 'Desa', 'required|min_length[3]', [
            'required' => 'Desa harus diisi',
            'min_length' => 'Desa terlalu pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|min_length[3]', [
            'required' => 'Nama Perusahaan harus diisi',
            'min_length' => 'Nama Perusahaan terlalu pendek'
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|min_length[3]', [
            'required' => 'Lat  harus diisi',
            'min_length' => 'Lat  terlalu pendek'
        ]);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|min_length[3]', [
            'required' => 'Long harus diisi',
            'min_length' => 'Long terlalu pendek'
        ]); 
        $this->form_validation->set_rules('tinggi_menara', 'Tinggi Menara', 'required', [
            'required' => 'Tinggi Menara  harus diisi',
            
        ]);
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/menara/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('backend/menara/ubah_menara', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/menara/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $email = $this->input->post('email', true);
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
                'id_site' => $this->input->post('id_site', true),
                'site_name' => $this->input->post('site_name', true),
                'id_desa' => $this->input->post('id_desa', true),
                'id_kecamatan' => $this->input->post('id_kecamatan', true),
                'alamat' => $this->input->post('alamat', true),
                'latitude' => $this->input->post('latitude', true),
                'longitude' => $this->input->post('longitude', true),
                'tinggi_menara' => $this->input->post('tinggi_menara', true),
                'imb' => $this->input->post('imb', true),
                'rekom' => $this->input->post('rekom', true),
                'tahun_rekom' => $this->input->post('tahun_rekom', true),
                'image' => $gambar,
                
            ];
            $this->ModelMenara->updateMenara($data, ['id_menara' => $this->input->post('id_menara')]);
            redirect('menara');
        }
    }

}
