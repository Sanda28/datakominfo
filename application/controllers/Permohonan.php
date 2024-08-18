o<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{   
    public function index()
    {
        $data['judul'] = 'Permohonan';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('permohonan/permohonan', $data);
        $this->load->view('home/template/footer', $data);
        
    }
    public function menarabaru()
    {
        $data['judul'] = 'Permohonan';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menarabaru'] = $this->ModelMenara->getMenarabaru()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/menarabaru/menarabaru', $data);
        $this->load->view('templates/footer');
        
    }
    public function hapusMenarabaru()
    {
        $where = ['id_menarabaru' => $this->uri->segment(3)];
        
        $this->ModelMenara->hapusMenarabaru($where);
        redirect('permohonan/menarabaru');
    }
    public function menaraeksisting()
    {
        $data['judul'] = 'Permohonan';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menaraeksisting'] = $this->ModelMenara->getMenaraeksisting()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/menaraeksisting/menaraeksisting', $data);
        $this->load->view('templates/footer');
    }
    public function hapusMenaraeksisting()
    {
        $where = ['id_menaraeksisting' => $this->uri->segment(3)];
        $this->ModelMenara->hapusMenaraeksisting($where);
        redirect('permohonan/menaraeksisting');
    }
    public function detaildokumen()
    {
        $data['judul'] = 'Detail Dokumen';
        $data['user'] = $this->ModelData->cekData(['email' => $this->session->userdata('email')])->row_array();

        $id_menarabaru = $this->uri->segment(3);
        $data['surat'] = $this->uri->segment(4);
        $data['file']= $this->db->query("SELECT advice FROM menarabaru WHERE id_menarabaru='$id_menarabaru'");
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('backend/menarabaru/detaildokumen', $data);
        $this->load->view('templates/footer');
        
        
    }
    public function setujuAct()
    {
        $id_menarabaru = $this->uri->segment(3);
        $bo = $this->db->query("SELECT*FROM menarabaru WHERE id_menarabaru='$id_menarabaru'")->row();
        $data = [
            'email' => $bo->email,
            'advice' => $bo->advice,
            'akta' => $bo->akta,
            'ktp' => $bo->ktp,
            'ktpwarga' => $bo->ktpwarga,
            'rekomendasi' => $bo->rekomendasi,
            'pks' => $bo->pks,
            'pernyataan' => $bo->pernyataan,
            'ats' => $bo->ats,
            'keselamatan' => $bo->keselamatan,
            'kuasa' => $bo->kuasa,
            'status' => "Disetujui",
        ];
        $this->ModelMenara->simpanHasilmenara($data);
        $this->db->query("DELETE  FROM menarabaru WHERE id_menarabaru= $id_menarabaru");

        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">Data Peminjaman Berhasil Disimpan</div>');
        redirect(base_url() . 'permohonan/hasilmenara');
    }
    public function setuju()
    {
        $id_menarabaru = $this->uri->segment(3);
        
        $status = 'Disetujui';
        $this->db->query("UPDATE menarabaru SET status='$status' WHERE id_menarabaru='$id_menarabaru'");
        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">Data  Berhasil Disimpan</div>');
        redirect('permohonan/menarabaru');
    }
    public function tidaksetuju()
    {
        $id_menarabaru = $this->uri->segment(3);
        
        $status = 'Tidak Disetujui';
        $this->db->query("UPDATE menarabaru SET status='$status' WHERE id_menarabaru='$id_menarabaru'");
        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">Data  Berhasil Disimpan</div>');
        redirect('permohonan/menarabaru');
    }
    public function setujumenara()
    {
        $id_menaraeksisting = $this->uri->segment(3);
        
        $status = 'Disetujui';
        $this->db->query("UPDATE menaraeksisting SET status='$status' WHERE id_menaraeksisting='$id_menaraeksisting'");
        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">Data  Berhasil Disimpan</div>');
        redirect('permohonan/menaraeksisting');
    }
    public function tidaksetujumenara()
    {
        $id_menaraeksisting = $this->uri->segment(3);
        
        $status = 'Tidak Disetujui';
        $this->db->query("UPDATE menaraeksisting SET status='$status' WHERE id_menaraeksisting='$id_menaraeksisting'");
        $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success" role="alert">Data  Berhasil Disimpan</div>');
        redirect('permohonan/menaraeksisting');
    }
    
    
}