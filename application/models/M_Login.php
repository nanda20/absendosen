<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

public function cek_login($data)
	{
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jurusan','karyawan.id_jurusan=jurusan.id_jurusan');
		$this->db->where('nip_karyawan',$data['nip']);
		$this->db->where('password',$data['pass']);
		$query= $this->db->get();
		return  $query->result();


	}

}

