<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Absen');

	}

	public function index()
	{
		$this->load->view('absen_v');

	}

	public function template($view,$data){
		$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
	}
	public function insertAbsen(){

		date_default_timezone_set("Asia/jakarta");
		$data=[
		 		'nip_karyawan'=> $this->input->post("nip_karyawan"),				
				'password'=> $this->input->post("password")
			  ];

		$login=$this->M_Absen->cek_absen($data);
		if(count($login)==1){
					$this->M_Absen->data_insert($login[0]->status,$data['nip_karyawan']);
			// redirect('Absen','refresh');
		}else{
			echo "User tidak tersedia";
			
		}
		redirect('Absen','refresh');

	}

	public function absen_dosen(){
		$this->load->library('session');
		$data = [ 'data'=> $this->M_Absen->data_absen('absen_karyawan',$this->session->id_jurusan,"",""),
				'status'=>"dosen" ];
		$this->template('absen_dosen_v',$data);
	}
	
	public function absen_admin(){
		$this->load->library('session');
		$data = ['data'=> $this->M_Absen->data_absen('absen_admin',$this->session->id_jurusan,"",
			""),'status'=>"admin" ];
		// var_dump($data);
		$this->template('absen_dosen_v',$data);
	}
	public function api_absen(){
		$id_jurusan= $this->input->post('id_jurusan');
		// $status= $this->input->post('status');
		// $this->load->library('session');
		
		// if($status =="Dosen"){
		// 	$table="absen_karyawan";
		// }else{
		// 	$table="absen_admin";
		// }
		$data = [
		"status"=>200,
		"result"=>
		['data_dosen'=>$this->M_Absen->data_absen("absen_karyawan",$id_jurusan,"","Dosen"),
		'data_admin'=>$this->M_Absen->data_absen("absen_admin",$id_jurusan,"","Admin"),
		'count_admin'=>count($this->M_Absen->data_absen("absen_admin",$id_jurusan,"","Admin")),
		 'count_dosen'=>count($this->M_Absen->data_absen("absen_karyawan",$id_jurusan,"","Dosen"))
		]];
		 // header('Content-Type: application/json');
		echo json_encode($data);
	}
}
