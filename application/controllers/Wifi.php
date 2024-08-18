<?php
class Wifi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }
    public function index()
    {
        $data['judul'] = 'Data Wifi BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['wifi'] = $this->ModelWifi->lihat_wifi();
        $data['desa'] = $this->ModelMenara->getDesa()->result_array();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan ORDER BY kecamatan ASC")->result_array();

        $this->form_validation->set_rules('id_site', 'Id Site', 'required|min_length[3]', [
            'required' => 'Id site harus diisi',
            'min_length' => 'Id SIte terlalu pendek'
        ]);
        
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|min_length[3]', [
            'required' => 'Site Name harus diisi',
            'min_length' => 'SIte NAme terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('id_desa', 'Desa', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', [
            'required' => 'Site Name harus diisi',
        ]);

        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/wifi/';
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
            $this->load->view('backend/wifi/wifi', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'id_site' => $this->input->post('id_site', true),
                'name_site' => $this->input->post('name_site', true),
                'id_desa' => $this->input->post('id_desa', true),
                'id_kecamatan' => $this->input->post('id_kecamatan', true),
                'alamat' => $this->input->post('alamat', true),
                'latitude' => $this->input->post('latitude', true),
                'longitude' => $this->input->post('longitude', true),
                'tahun' => $this->input->post('tahun', true),
                'bandwitch' => $this->input->post('bandwitch', true),
                'image' => $gambar,
            ];
            $this->ModelWifi->simpanWifi($data);
            redirect('wifi');
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
    public function hapusWifi()
    {
        $where = ['id_wifi' => $this->uri->segment(3)];
        $this->ModelWifi->hapusWifi($where);
        redirect('wifi');
    }
    public function detailWifi()
    {
        $data['judul'] = 'Detail Wifi BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $data['wifi'] = $this->ModelWifi->wifiWhere(['id_wifi' => $this->uri->segment(3)])->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/wifi/detail_wifi', $data);
        $this->load->view('templates/footer');
    }

    public function ubahWifi()
    {
        $data['judul'] = 'Data Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['wifi'] = $this->ModelWifi->join_wifi(['id_wifi' => $this->uri->segment(3)])->result_array();
        $data['desa'] = $this->ModelMenara->getDesa()->result_array();
        $data['kecamatan'] = $this->ModelMenara->getKecamatan()->result_array();

        
        
        $this->form_validation->set_rules('name_site', 'Site Name', 'required|min_length[3]', [
            'required' => 'Site Name harus diisi',
            'min_length' => 'SIte NAme terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('id_desa', 'Desa', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required', [
            'required' => 'Site Name harus diisi',
        ]);
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', [
            'required' => 'Site Name harus diisi',
        ]);

        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/wifi/';
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
            $this->load->view('backend/wifi/ubah_wifi', $data);
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
                'id_site' => $this->input->post('id_site', true),
                'name_site' => $this->input->post('name_site', true),
                'id_desa' => $this->input->post('id_desa', true),
                'id_kecamatan' => $this->input->post('id_kecamatan', true),
                'alamat' => $this->input->post('alamat', true),
                'latitude' => $this->input->post('latitude', true),
                'longitude' => $this->input->post('longitude', true),
                'tahun' => $this->input->post('tahun', true),
                'bandwitch' => $this->input->post('bandwitch', true),
                'image' => $gambar,
            ];
            $this->ModelWifi->updateWifi($data, ['id_wifi' => $this->input->post('id_wifi')]);
            redirect('wifi');
        }
    }
    public function load_wifi()
    {
        $judul= 'Data Wifi BTS';
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $tahun= $_GET['tahun'];
        
        if ($tahun == 0) {
            $data = $this->db->query("SELECT *
            FROM wifi INNER JOIN desa ON desa.id_desa=wifi.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = wifi.id_kecamatan")->result_array();
        }
        else{
            $data = $this->db->query("SELECT *
            FROM wifi
            INNER JOIN desa ON desa.id_desa=wifi.id_desa INNER JOIN kecamatan on kecamatan.id_kecamatan = wifi.id_kecamatan
            WHERE tahun='$tahun'")->result_array();
        }
        if  (!empty($data)){
            $a = 1; foreach ($data as $k) { ?>
                <tr>
                <td><?php echo $a++ ?></td>
                <td> <?= $k['name_site']; ?> </td>
                <td> <?= $k['alamat']; ?> </td>
                <td> <?= $k['kecamatan']; ?> </td>
                <td> <?= $k['desa']; ?> </td>
                <td>
                    <a href="<?= base_url('wifi/ubahwifi/') . $k['id_wifi']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="<?= base_url('wifi/detailwifi/') . $k['id_wifi']; ?>" class="badge badge-search"><i class="fas fw fa-search"></i> Detail</a>
                    <a href="<?= base_url('wifi/hapuswifi/') . $k['id_wifi']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['name_site']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
}
