<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelWifi extends CI_Model
{
    //manajemen buku
    public function getWifi()
    {
        return $this->db->get('wifi');
    }
    public function wifiWhere($where)
    {
        return $this->db->get_where('wifi', $where);
    }
    public function simpanWifi($data = null)
    {
        $this->db->insert('wifi',$data);
    }
    public function updateWifi($data = null, $where = null)
    {
        $this->db->update('wifi', $data, $where);
    }
    public function hapusWifi($where = null)
    {
        $this->db->delete('wifi', $where);
    }
    public function getWifiWhere($where = null)
    {
        return $this->db->get_where('wifi', $where);
    }   
    public function lihat_wifi()
    {
		$this->db->select('*');
		$this->db->from('wifi');
		$this->db->join('desa', 'desa.id_desa = wifi.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = wifi.id_kecamatan');
		$query = $this->db->get();
		return $query->result_array();
	}
    public function join_wifi($where)
    {
        $this->db->from('wifi');
        $this->db->join('desa','desa.id_desa = wifi.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = wifi.id_kecamatan');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getDesa()
    {
        return $this->db->get('desa');
    }
    public function simpanDesa($data = null)
    {
        $this->db->insert('desa',$data);
    }
    public function getKecamatan()
    {
        return $this->db->get('kecamatan');
    }

}

