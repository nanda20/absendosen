<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('karyawan_model','karyawan');
		$this->load->helper('url');
	}
	public function data_karyawan(){
		$this->template('karyawan_view');	
	}
	public function index()
	{
		// $this->template('karyawan_view');	
		$this->template('home_page_v');

		
	}

	public function template($view){
		$this->load->view('header');
		$this->load->view($view);
		$this->load->view('footer');
	}

	public function ajax_list()
	{
		$list = $this->karyawan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $karyawan) {
			$no++;
			$row = array();
			$row[] = $karyawan->nip_karyawan;
			$row[] = $karyawan->nama_karyawan;
			$row[] = $karyawan->status;
			$row[] = $karyawan->alamat;
			$row[] = $karyawan->telp;
			// $row[] = $karyawan->id_jurusan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_karyawan('."'".$karyawan->nip_karyawan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_karyawan('."'".$karyawan->nip_karyawan."'".')"><i ajax_updateclass="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->karyawan->count_all(),
						"recordsFiltered" => $this->karyawan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($nip_karyawan)
	{
		$data = $this->karyawan->get_by_nip_karyawan($nip_karyawan);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nip_karyawan' => $this->input->post('nip_karyawan'),
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'alamat' => $this->input->post('alamat'),
				'id_jurusan' => $this->input->post('id_jurusan'),
				'telp' => $this->input->post('telp'),
				'status' => $this->input->post('status'),
				'password' => $this->input->post('password'),
			);

		 $insert = $this->karyawan->save($data);
		 echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				
				'nip_karyawan' => $this->input->post('nip_karyawan'),
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'alamat' => $this->input->post('alamat'),
				'id_jurusan' => $this->input->post('id_jurusan'),
				'telp' => $this->input->post('telp'),
				'status' => $this->input->post('status'),
				'password' => $this->input->post('password'),
			);
		print_r($data);
		$this->karyawan->update(array('nip_karyawan' => $this->input->post('nip_karyawan')), $data);
		// echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($nip_karyawan)
	{
		$this->karyawan->delete_by_nip_karyawan($nip_karyawan);
		echo json_encode(array("status" => TRUE));
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Login','refresh');

	}

	
}
