<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Saran_model','Saran');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('Saran_view');
	}

	public function ajax_list()
	{
		$list = $this->Saran->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Saran) {
			$no++;
			$row = array();
			$row[] = $Saran->yourname;
			$row[] = $Saran->youremail;
			$row[] = $Saran->yourphone;
			$row[] = $Saran->yourmessage;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_Saran('."'".$Saran->id_saran."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_Saran('."'".$Saran->id_saran."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Saran->count_all(),
						"recordsFiltered" => $this->Saran->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_saran)
	{
		$data = $this->Saran->get_by_id_saran($id_saran);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'yourname' => $this->input->post('yourname'),
				'youremail' => $this->input->post('youremail'),
				'yourphone' => $this->input->post('yourphone'),
				'yourmessage' => $this->input->post('yourmessage'),
			);
		$insert = $this->Saran->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'yourname' => $this->input->post('yourname'),
				'youremail' => $this->input->post('youremail'),
				'yourphone' => $this->input->post('yourphone'),
				'yourmessage' => $this->input->post('yourmessage'),
			);
		$this->Saran->update(array('id_saran' => $this->input->post('id_saran')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_saran)
	{
		$this->Saran->delete_by_id_saran($id_saran);
		echo json_encode(array("status" => TRUE));
	}

}
