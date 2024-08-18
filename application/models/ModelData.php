<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelData  extends CI_Model
{
    public function getAkun()
    {
        return $this->db->get('user');
    }
    public function getKecamatan()
    {
        return $this->db->get('kecamatan');
    }
    public function getDesa()
    {
        return $this->db->get('desa');
    }
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
    return $this->db->get();
    }
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
    
    public function cek_login()
    {
        $email   = set_value('email');
        $password   = set_value('password');

        $result = $this->db->where('email', $email)
                            ->where('password',md5($password) )
                            ->limit(1)
                            ->get('user');
        if($result->num_rows()>0){
            return $result->row();
        }else {
            return False;
        }
    }
    public function join_akun($where)
    {
        $this->db->from('user');
        $this->db->where($where);
        return $this->db->get();
    }
    public function updateAkun($data = null, $where = null)
    {
        $this->db->update('user', $data, $where);
    }
    public function chartmenara()
    {
        $sql = "SELECT kecamatan.kecamatan, count(menara.id_kecamatan) as jumlah FROM menara 
            INNER JOIN desa ON desa.id_desa=menara.id_desa 
            INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan 
            GROUP BY menara.id_kecamatan ORDER BY kecamatan ASC";
        return $this->db->query($sql)->result_array();

    }
    public function chartwifi()
    {
        $sql = "SELECT kecamatan.kecamatan, count(wifi.id_kecamatan) as jumlah FROM wifi 
            INNER JOIN desa ON desa.id_desa=wifi.id_desa 
            INNER JOIN kecamatan on kecamatan.id_kecamatan = wifi.id_kecamatan 
            GROUP BY wifi.id_kecamatan ORDER BY kecamatan ASC";
        return $this->db->query($sql)->result_array();

    }
    public function getKecWhere($where = null)
    {
        return $this->db->get_where('menara', $where);
        $this->db->join('desa', 'desa.id_desa = menara.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = menara.id_kecamatan');
		
    }
    public function kecamatanmenara()
    {
        $sql = "SELECT kecamatan.kecamatan, count(menara.id_kecamatan) as jumlah FROM menara 
            INNER JOIN desa ON desa.id_desa=menara.id_desa 
            INNER JOIN kecamatan on kecamatan.id_kecamatan = menara.id_kecamatan 
            GROUP BY menara.id_kecamatan ORDER BY kecamatan ASC";
        return $this->db->query($sql)->result_array();

    }

}