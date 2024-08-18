<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelMenara extends CI_Model
{
    //manajemen buku
    public function getMenara()
    {
        return $this->db->get('menara');
    }
    public function getWifi()
    {
        return $this->db->get('wifi');
    }
    public function menaraWhere($where)
    {
        return $this->db->get_where('menara', $where);
    }
    public function simpanMenara($data = null)
    {
        $this->db->insert('menara',$data);
    }
    public function simpanHasilmenara($data = null)
    {
        $this->db->insert('hasilmenara',$data);
    }
    public function updateMenara($data = null, $where = null)
    {
        $this->db->update('menara', $data, $where);
    }
    public function hapusMenara($where = null)
    {
        $this->db->delete('menara', $where);
    }
    public function getMenaraWhere($where = null)
    {
        return $this->db->get_where('menara', $where);
    }   
    public function lihat_menara()
    {
		$this->db->select('*');
		$this->db->from('menara');
		$this->db->join('desa', 'desa.id_desa = menara.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = menara.id_kecamatan');
		$query = $this->db->get();
		return $query->result_array();
	}
    public function join_menara($where)
    {
        $this->db->from('menara');
        $this->db->join('desa','desa.id_desa = menara.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = menara.id_kecamatan');
        $this->db->where($where);
        return $this->db->get();
    }
    public function join_menarabaru($where)
    {
        $this->db->from('menarabaru');
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
    public function getMenarabaru()
    {
        return $this->db->get('menarabaru');
    }
    public function menarabaruWhere($where)
    {
        return $this->db->get_where('menarabaru', $where);
    }
    public function simpanMenarabaru($data = null)
    {
        $this->db->insert('menarabaru',$data);
    }
    public function updateMenarabaru($data = null, $where = null)
    {
        $this->db->update('menarabaru', $data, $where);
    }
    public function hapusMenarabaru($where = null)
    {
        $this->db->delete('menarabaru', $where);
    }
    public function getMenarabaruWhere($where = null)
    {
        return $this->db->get_where('menarabaru', $where);
    }   
    public function getMenaraeksisting()
    {
        return $this->db->get('menaraeksisting');
    }
    public function menaraeksistingWhere($where)
    {
        return $this->db->get_where('menaraeksisting', $where);
    }
    public function simpanMenaraeksisting($data = null)
    {
        $this->db->insert('menaraeksisting',$data);
    }
    public function updateMenaraeksisting($data = null, $where = null)
    {
        $this->db->update('menaraeksisting', $data, $where);
    }
    public function hapusMenaraeksisting($where = null)
    {
        $this->db->delete('menaraeksisting', $where);
    }
    public function getMenaraeksistingWhere($where = null)
    {
        return $this->db->get_where('menaraeksisting', $where);
    }   

}

