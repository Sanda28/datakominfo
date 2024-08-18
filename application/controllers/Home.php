<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['judul']= 'Beranda';

		$this->load->view('home/template/header',$data);
		$this->load->view('home/template/navbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/template/footer');

	}

	public function peta()
	{
		$data['judul']= 'Peta';
		$data['menara'] = $this->ModelMenara->getMenara()->result_array();
		
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result_array();


		$this->load->view('home/template/header',$data);
		$this->load->view('home/template/navbar', $data);
		$this->load->view('home/peta', $data);
		$this->load->view('home/template/footer');

	}
	public function statistik()
	{
		$data['judul']= 'Statistik';
		$data['menara'] = $this->ModelMenara->lihat_menara();
		$data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result_array();
		
        $data['jumlah'] = $this->ModelData->kecamatanmenara();
        

		$this->load->view('home/template/header',$data);
		$this->load->view('home/template/navbar', $data);
		$this->load->view('home/statistik', $data);
		$this->load->view('home/template/footer');

	}
	public function kontak()
	{
		$data['judul']= 'kontak';
		
		$this->load->view('home/template/header',$data);
		$this->load->view('home/template/navbar', $data);
		$this->load->view('home/kontak', $data);
		$this->load->view('home/template/footer');

	}
	
}
