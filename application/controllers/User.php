<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user1();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->result_array();
        $id = $this->session->userdata('id_user');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('frontend/dashboard/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function dashboard()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('frontend/dashboard/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function menarabaru()
	{
		$data['judul'] = 'Permohonan Menara Baru';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menarabaru'] = $this->ModelMenara->getMenarabaru();
        $email = $this->session->userdata('email');
        $data['menara'] = $this->db->query("SELECT * FROM menarabaru WHERE email='$email' ")->result_array();

        $this->form_validation->set_rules('lol', 'lol', 'required');
		
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/surat/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/menarabaru/menarabaru', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('advice')) {
                $advice = $this->upload->data();
                $data1 = $advice['file_name'];
            } else {
                $data1 = '';
            }
            if ($this->upload->do_upload('akta')) {
                $akta = $this->upload->data();
                $data2 = $akta['file_name'];
            } else {
                $data2 = '';
            }
            if ($this->upload->do_upload('ktp')) {
                $ktp = $this->upload->data();
                $data3 = $ktp['file_name'];
            } else {
                $data3 = '';
            }
            if ($this->upload->do_upload('ktpwarga')) {
                $ktpwarga = $this->upload->data();
                $data4 = $ktpwarga['file_name'];
            } else {
                $data4 = '';
            }
            if ($this->upload->do_upload('rekomendasi')) {
                $rekomendasi = $this->upload->data();
                $data5 = $rekomendasi['file_name'];
            } else {
                $data5 = '';
            }
            if ($this->upload->do_upload('pks')) {
                $pks = $this->upload->data();
                $data6 = $pks['file_name'];
            } else {
                $data6 = '';
            }
            if ($this->upload->do_upload('pernyataan')) {
                $pernyataan = $this->upload->data();
                $data7 = $pernyataan['file_name'];
            } else {
                $data7 = '';
            }
            if ($this->upload->do_upload('ats')) {
                $ats = $this->upload->data();
                $data8 = $ats['file_name'];
            } else {
                $data8 = '';
            }
            if ($this->upload->do_upload('keselamatan')) {
                $keselamatan = $this->upload->data();
                $data9 = $keselamatan['file_name'];
            } else {
                $data9 = '';
            }
            if ($this->upload->do_upload('kuasa')) {
                $kuasa = $this->upload->data();
                $data10 = $kuasa['file_name'];
            } else {
                $data10 = '';
            }
             
            $data = [
                'email' => $email = $this->session->userdata('email'),
                'advice' => $data1,
                'akta' => $data2,
                'ktp' => $data3,
                'ktpwarga' => $data4,
                'rekomendasi' => $data5,
                'pks' => $data6,
                'pernyataan' => $data7,
                'ats' => $data8,
                'keselamatan' => $data9,
                'kuasa' => $data10,
                'status' => "Proses"
            ];
            $this->ModelMenara->simpanMenarabaru($data);
            redirect('user/menarabaru');
        } 
	}
    public function ubahMenarabaru()
    {
        $data['judul'] = 'Data Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menarabaru'] = $this->ModelMenara->join_menarabaru(['id_menarabaru' => $this->uri->segment(3)])->result_array();
        

        $this->form_validation->set_rules('lol', 'lol', 'required');
        
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
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/menarabaru/ubah_menarabaru', $data);
            $this->load->view('templates/footer');
        } else {
            
            $email = $this->input->post('email', true);
        
            if ($this->upload->do_upload('advice')) {
                $advice_lama = $data['menarabaru']['advice'];
                if ($advice_lama != 'default.pdf') {
                    unlink(FCPATH . 'assets/surat/' . $advice_lama);
                }

                $advice_baru = $this->upload->data('file_name');
                $this->db->set('advice', $advice_baru);
            } else { }
            if ($this->upload->do_upload('akta')) {
                $akta_lama = $data['menarabaru']['akta'];
                if ($akta_lama != 'default.pdf') {
                    unlink(FCPATH . 'assets/surat/' . $akta_lama);
                }

                $akta_baru = $this->upload->data('file_name');
                $this->db->set('akta', $akta_baru);
            } else { }
            if ($this->upload->do_upload('ktp')) {
                $ktp_lama = $data['menarabaru']['ktp'];
                if ($ktp_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $ktp_lama);
                }

                $ktp_baru = $this->upload->data('file_name');
                $this->db->set('ktp', $ktp_baru);
            } else { }

            if ($this->upload->do_upload('ktpwarga')) {
                $ktpwarga_lama = $data['menarabaru']['ktpwarga'];
                if ($ktpwarga_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $ktpwarga_lama);
                }

                $ktpwarga_baru = $this->upload->data('file_name');
                $this->db->set('ktpwarga', $ktpwarga_baru);
            } else { }

            if ($this->upload->do_upload('rekomendasi')) {
                $rekomendasi_lama = $data['menarabaru']['rekomendasi'];
                if ($rekomendasi_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $rekomendasi_lama);
                }

                $rekomendasi_baru = $this->upload->data('file_name');
                $this->db->set('rekomendasi', $rekomendasi_baru);
            } else { }
            if ($this->upload->do_upload('pks')) {
                $pks_lama = $data['menarabaru']['pks'];
                if ($pks_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $pks_lama);
                }

                $pks_baru = $this->upload->data('file_name');
                $this->db->set('pks', $pks_baru);
            } else { }
            if ($this->upload->do_upload('pernyataan')) {
                $pernyataan_lama = $data['menarabaru']['pernyataan'];
                if ($pernyataan_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $pernyataan_lama);
                }

                $pernyataan_baru = $this->upload->data('file_name');
                $this->db->set('pernyataan', $pernyataan_baru);
            } else { }
            if ($this->upload->do_upload('ats')) {
                $ats_lama = $data['menarabaru']['ats'];
                if ($ats_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $ats_lama);
                }

                $ats_baru = $this->upload->data('file_name');
                $this->db->set('ats', $ats_baru);
            } else { }
            if ($this->upload->do_upload('keselamatan')) {
                $keselamatan_lama = $data['menarabaru']['keselamatan'];
                if ($keselamatan_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $keselamatan_lama);
                }

                $keselamatan_baru = $this->upload->data('file_name');
                $this->db->set('keselamatan', $keselamatan_baru);
            } else { } 
            if ($this->upload->do_upload('kuasa')) {
                $kuasa_lama = $data['menarabaru']['kuasa'];
                if ($kuasa_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/surat/' . $kuasa_lama);
                }

                $kuasa_baru = $this->upload->data('file_name');
                $this->db->set('kuasa', $kuasa_baru);
            } else { }
             
            
            
            $this->db->set('email', $email);
            
            $this->db->where('email', $email);
            $this->db->update('menarabaru');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">File Berhasil diubah </div>');
            redirect('user/menarabaru');
        }
    }
    public function detaildokumen()
    {
        $data['judul'] = 'Detail Dokumen';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_menarabaru = $this->uri->segment(3);
        $data['surat'] = $this->uri->segment(4);
        $data['file']= $this->db->query("SELECT advice FROM menarabaru WHERE id_menarabaru='$id_menarabaru'");
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('frontend/menarabaru/detaildokumen', $data);
        $this->load->view('templates/footer');
        
        
    }
    public function menaraeksisting()
	{
		$data['judul'] = 'Permohonan Menara Eksisting';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menaraeksisting'] = $this->ModelMenara->getMenaraeksisting();
        $email = $this->session->userdata('email');
        $data['menara'] = $this->db->query("SELECT * FROM menaraeksisting WHERE email='$email' ")->result_array();

        $this->form_validation->set_rules('lol', 'lol', 'required');
		
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/surat/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/menaraeksisting/menaraeksisting', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('advice')) {
                $advice = $this->upload->data();
                $data1 = $advice['file_name'];
            } else {
                $data1 = '';
            }
            if ($this->upload->do_upload('imb')) {
                $imb = $this->upload->data();
                $data2 = $imb['file_name'];
            } else {
                $data2 = '';
            }
            if ($this->upload->do_upload('ktp')) {
                $ktp = $this->upload->data();
                $data3 = $ktp['file_name'];
            } else {
                $data3 = '';
            }
            if ($this->upload->do_upload('pks')) {
                $pks = $this->upload->data();
                $data4 = $pks['file_name'];
            } else {
                $data4 = '';
            }
            if ($this->upload->do_upload('pernyataan')) {
                $pernyataan = $this->upload->data();
                $data5 = $pernyataan['file_name'];
            } else {
                $data5 = '';
            }
            if ($this->upload->do_upload('keselamatan')) {
                $keselamatan = $this->upload->data();
                $data6 = $keselamatan['file_name'];
            } else {
                $data6 = '';
            }
            if ($this->upload->do_upload('kuasa')) {
                $kuasa = $this->upload->data();
                $data7 = $kuasa['file_name'];
            } else {
                $data7 = '';
            }
             
            $data = [
                'email' => $email = $this->session->userdata('email'),
                'advice' => $data1,
                'imb' => $data2,
                'ktp' => $data3,
                'pks' => $data4,
                'pernyataan' => $data5,
                'keselamatan' => $data6,
                'kuasa' => $data7,
                'status' => "Proses"
            ];
            $this->ModelMenara->simpanMenaraeksisting($data);
            redirect('user/menaraeksisting');
        } 
	}
    public function profil()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('frontend/profil/profil', $data);
        $this->load->view('templates/footer');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/profil/ubah-profil', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nohp = $this->input->post('no_hp', true);
            $alamat = $this->input->post('alamat', true);
            $jenis = $this->input->post('jenis_kelamin', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { 

                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('no_hp', $nohp);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user/profil');
        }
    }
    

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password saat ini harus diisi'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Password Baru tidak sama dengan ulangi password'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Ulangi Password harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Ulangi Password tidak sama dengan password baru'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/profil/gantipassword', $data);
            $this->load->view('templates/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('user/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('user/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('user/ubahPassword');
                }
            }
        }
    }
}
