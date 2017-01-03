<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model {

	public function make_reporting($table,$bln,$status,$id_jurusan){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join("karyawan",$table.".nip_karyawan = karyawan.nip_karyawan");
		$this->db->where('karyawan.id_jurusan',$id_jurusan);
		// $this->db->where()
		if($bln !=""){
			$this->db->where('month('.$table.'.tanggal)',$bln);	
		}
		$this->db->where('karyawan.status',$status);	
		$query= $this->db->get();
		return  $query->result();
	}	

}

