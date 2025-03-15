<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Cuttype extends CI_Controller {
    public function index(){
		$this->load->model('Cuttypeinfo');
		$this->load->model('Commeninfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('cuttype',$result);
	}
   
	public function Cuttypeinsertupdate(){
		$this->load->model('Cuttypeinfo');
        $result=$this->Cuttypeinfo->Cuttypeinsertupdate();
	}
	public function Cuttypeedit(){
		$this->load->model('Cuttypeinfo');
        $result=$this->Cuttypeinfo->Cuttypeedit();
	}
	public function Cuttypestatus($x, $y){
		$this->load->model('Cuttypeinfo');
        $result=$this->Cuttypeinfo->Cuttypestatus($x, $y);
	}
	public function GetMainCatList(){
		$this->load->model('Cuttypeinfo');
        $result=$this->Cuttypeinfo->GetMainCatList();
	}
	
}
