<?php
class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }
    public function index()
    {
        $data['judul'] = 'Data Akun';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->ModelData->getAkun()->result_array();

        $this->form_validation->set_rules('nama', 'Nama ', 'required|min_length[3]', [
            'required' => 'Nama  harus diisi',
            'min_length' => 'Nama  terlalu pendek'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]', [
            'required' => 'Email harus diisi',
            'min_length' => 'Email terlalu pendek'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Role harus diisi',
        ]);


        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
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
            $this->load->view('backend/akun/akun', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'role_id' => $this->input->post('role_id', true),
                'image' => 'default.jpg',
                'password' => password_hash('2023', PASSWORD_DEFAULT),
                'is_active' => 1,
                'tgl_input' => time()
            ];

            $this->ModelData->simpanData($data);
            redirect('akun');
        }
    }
    public function ubahAkun()
    {
        $data['judul'] = 'Data Menara BTS';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->ModelData->join_akun(['id_user' => $this->uri->segment(3)])->result_array();
        
        $this->form_validation->set_rules('nama', 'Nama ', 'required|min_length[3]', [
            'required' => 'Nama  harus diisi',
            'min_length' => 'Nama  terlalu pendek'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]', [
            'required' => 'Email harus diisi',
            'min_length' => 'Email terlalu pendek'
        ]);
        $this->form_validation->set_rules('role_id', 'Role Id', 'required', [
            'required' => 'Role harus diisi',
        ]);
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
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
            $this->load->view('backend/akun/ubah_akun', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => $this->input->post('role_id', true),
            ];
            $this->ModelData->updateAkun($data, ['id_user' => $this->input->post('id_user')]);
            redirect('akun');
        }
    }
    public function hapusAkun()
    {
        $where = ['id_user' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        redirect('akun');
    }

}
