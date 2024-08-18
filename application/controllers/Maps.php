<?php
class Maps extends CI_Controller
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
        $data['menara'] = $this->ModelMenara->getMenara()->result_array();
        $data['wifi'] = $this->ModelMenara->getWifi()->result_array();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/maps/maps', $data);
        $this->load->view('templates/footer');
        
    }
    public function kabelfo()
    {
        $data['judul'] = 'Data Kabel FO';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menara'] = $this->ModelMenara->getMenara()->result_array();
        $data['wifi'] = $this->ModelMenara->getWifi()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/maps/kabelfo', $data);
        $this->load->view('templates/footer');
    }
    public function pemetaanjaringan()
    {
        $data['judul'] = 'Pemetaan Jaringan';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menara'] = $this->ModelMenara->getMenara()->result_array();
        $data['wifi'] = $this->ModelMenara->getWifi()->result_array();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result_array();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/maps/pemetaanjaringan', $data);
        $this->load->view('templates/footer');
    }
}

