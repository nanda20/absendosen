<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Report');

	}

	public function index()
	{
		
	}
	public function template($view,$data){
		$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
	}

	public function get_reporting(){

		$this->load->library('session');
		if($this->input->post('month')!=""){
			$month= $this->input->post('month');
			$status= $this->input->post('status');
			$date = date_parse($month);
			if($status=="Dosen"){
				$table="absen_karyawan";
			}else{
				$table="absen_admin";
			}
			$data=["data"=>$this->M_Report->make_reporting($table,$date['month'],$status,$this->session->id_jurusan)];
        	// var_dump($data);
        	// }else{
        		// $data=["data"=>""];	
        	
		}else{
			$data=["data"=>$this->M_Report->make_reporting("absen_admin","0","0","0")];
		}
		
		// var_dump($data['data']);
		$this->template('reporting_v',$data);	
	}



}

