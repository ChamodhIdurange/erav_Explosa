<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class AdditionalCost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdditionalCostInfo');
        $this->load->model('Commeninfo');
    }
    public function index()
    {
        $data = $this->AdditionalCostInfo->get_index_data();

        $this->load->view('additionalcost', $data);
    }


    public function Costinsertupdate()
    {
        $this->AdditionalCostInfo->Costinsertupdate();
    }

    public function Costedit()
    {
        $this->AdditionalCostInfo->Costedit();
    }

    public function Coststatus($x, $y)
    {
        $this->AdditionalCostInfo->Coststatus($x, $y);
    }

    public function GetCostList()
    {
        $this->AdditionalCostInfo->Getcostlist();
    }
    public function cost_list()
    {
        $json_data = $this->AdditionalCostInfo->get_cost_list();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json_data));
    }

    public function fetch_cost_types()
    {
        $this->load->model('AdditionalCostInfo'); 
        $cost_types = $this->AdditionalCostInfo->get_cost_types(); 

        echo json_encode($cost_types, JSON_PRETTY_PRINT); 
    }

    public function save_additional_costs() {
		$data = $this->input->post('additionalCosts');
        $jobQuotationId = $this->input->post('jobQuotationId');

		if ($this->AdditionalCostInfo->save_additional_costs($data ,$jobQuotationId)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

    public function fetch_additional_costs_by_quotation($jobQuotationId) {
        $data = $this->AdditionalCostInfo->get_additional_costs_by_quotation($jobQuotationId);
        echo json_encode($data);
    }

    public function get_additional_cost($id)
{

    $data = $this->AdditionalCostInfo->get_additional_cost_by_id($id);
    echo json_encode($data);
}


    public function update_additional_cost() {
        $data = $this->input->post();
        $result = $this->AdditionalCostInfo->update_additional_cost($data);
        echo json_encode(['success' => $result]);
    }

    public function delete_additional_cost($id) {
        $result = $this->AdditionalCostInfo->delete_additional_cost($id);
        echo json_encode(['success' => $result]);
    }
}