<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Absen extends CI_Model {

public function cek_absen($data)
	{
		$this->db->select('status');
		$this->db->where('nip_karyawan',$data['nip_karyawan']);
		$this->db->where('password',$data['password']);
		$query= $this->db->get('karyawan');
		return  $query->result();


	}
	public function data_insert($status,$nip)
	{
		if($status =="Admin")
			{
				$this->db->insert("absen_admin",array("nip_karyawan"=>$nip,"jam_datang"=>date("H:i:s"),"tanggal"=>date("Y-m-d")));
			}else{
				
				$this->db->insert("absen_karyawan",array("nip_karyawan"=>$nip,"jam_datang"=>date("H:i:s"),"tanggal"=>date("Y-m-d")));
			}
		
	}
	public function data_absen($table,$id_jurusan,$bln,$status){

		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('karyawan',$table.'.nip_karyawan=karyawan.nip_karyawan');
		$this->db->join('jurusan','karyawan.id_jurusan=jurusan.id_jurusan');

		// if($bln ==""){
			// $tgl=date("Y-m-d");
			$this->db->where($table.'.tanggal',date("Y-m-d"));
		// }
		$this->db->where('karyawan.id_jurusan',$id_jurusan);
		if($status!=""){
			$this->db->where('karyawan.status',$status);
		}
		// echo $bln;
		// if($bln !=""){
		// 	$this->db->where('month(absen_karyawan.tanggal)',11);	
		// }
		// $this->db->where('absen_karyawan.tanggal',"2016-11-21");	

		$query= $this->db->get();
		return  $query->result();

	}





}

