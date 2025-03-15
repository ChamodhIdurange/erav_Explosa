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
        // Delegate to the model and output the JSON response
        $json_data = $this->AdditionalCostInfo->get_cost_list();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json_data));
    }
}