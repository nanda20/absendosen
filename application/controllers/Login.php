<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function cekLogin(){
		$this->load->library('session');
		$data=[
				'nip'=> $this->input->post("nip"),
				'pass'=> $this->input->post("pass")
			  ];
		$login=$this->M_Login->cek_login($data);
		
		// if(count($login)==1){
			if($login[0]->status == "Admin"){
				$data = ['jurusan' => $login[0]->nama_jurusan,'id_jurusan'=> $login[0]->id_jurusan];
				$this->session->set_userdata($data);
				$report=[
				"status"=>200,
				"data"=>$data];
				// echo json_encode($report);
				redirect('karyawan','refresh');

			}else{
				$report=["status"=>500,
				"data"=>""];
				echo json_encode($report);
			redirect('login','refresh');
			}
		// }else{
		// 	redirect('login','refresh');
		// 	}


	}

	public function api_cekLogin(){
		// $this->load->library('session');
		$data=[
				'nip'=> $this->input->post("nip"),
				'pass'=> $this->input->post("pass")
			  ];
		$login=$this->M_Login->cek_login($data);
		
		if(count($login)==1){
			if($login[0]->status == "Admin"){
				$data = ['jurusan' => $login[0]->nama_jurusan,'id_jurusan'=> $login[0]->id_jurusan];
				// $this->session->set_userdata($data);
				$report=["status"=>200,"login"=>"true","data"=>$data];
				echo json_encode($report);
				// redirect('karyawan','refresh');

			}else{
				$report=["status"=>500,"login"=>"false","data"=>""];
				echo json_encode($report);
			// redirect('login','refresh');
			}
		}else{
			$report=["status"=>500,"login"=>"false","data"=>""];
				echo json_encode($report);
		// 	redirect('login','refresh');
			}


	}

}
