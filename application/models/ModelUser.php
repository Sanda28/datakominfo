<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function join_akun($where)
    {
        $this->db->from('user');
        $this->db->where($where);
        return $this->db->get();
    }
    public function akunWhere($where)
    {
        return $this->db->get_where('user', $where);
    }
    public function tokenWhere($where)
    {
        $this->db->from('user_token');
        $this->db->where($where);
        return $this->db->get();
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function updateAkun($where = null, $data = null)
    {
        $this->db->update('user', $data, $where);
    }
    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function updateAbsen($where = null, $data = null)
    {
        $this->db->update('absen', $data, $where);
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
    public function hitunguser()
    {   
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
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
    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    
    }
    public function lihat_user(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role_id = 2');
		$query = $this->db->get();
		return $query->result_array();
	}
}