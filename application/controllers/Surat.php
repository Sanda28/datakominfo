<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }
    public function index()
    {
        $data['judul'] = 'Cetak Advice';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->ModelUser->lihat_user();
        $data['menara'] = $this->ModelMenara->lihat_menara();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/surat/index', $data);
        $this->load->view('templates/footer');
    } 
    
    public function cetakadvice()
    {
        $data['judul'] = 'Cetak Slip Gaji';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_user = $this->input->post('id_user');
        $data['nama_pemohon'] = $this->input->post('nama_pemohon');
        $data['id_site'] = $this->input->post('id_site');
        $data['site_name'] = $this->input->post('site_name');
        $data['alamatlokasi'] = $this->input->post('alamat');
        $data['latitude'] = $this->input->post('latitude');
        $data['longitude'] = $this->input->post('longitude');
        $data['status'] = $this->input->post('status');
        $data['antena'] = $this->input->post('antena');
        $data['cellplan'] = $this->input->post('cellplan');
        $data['jenis_menara'] = $this->input->post('jenis_menara');
        $data['tinggi_menara'] = $this->input->post('tinggi_menara');
        
        $data['printadvice'] = $this->db->query("SELECT user.nama,user.alamat FROM user WHERE user.id_user='$id_user'")->result_array();
        $this->load->view('backend/surat/cetakadvice', $data);            
    }
}
