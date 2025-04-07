<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Cartontype extends CI_Controller {
    public function index(){
        $this->load->model('Cartontypeinfo');
        $this->load->model('Commeninfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        $this->load->view('cartontype', $result);
    }
   
    public function Cartontypeinsertupdate(){
        $this->load->model('Cartontypeinfo');
        $result=$this->Cartontypeinfo->Cartontypeinsertupdate();
    }
    public function Cartontypeedit(){
        $this->load->model('Cartontypeinfo');
        $result=$this->Cartontypeinfo->Cartontypeedit();
    }
    public function Cartontypestatus($x, $y){
        $this->load->model('Cartontypeinfo');
        $result=$this->Cartontypeinfo->Cartontypestatus($x, $y);
    }
    public function GetCartontypeList(){
        $this->load->model('Cartontypeinfo');
        $result=$this->Cartontypeinfo->Getcartontypelist();
    }
    
}