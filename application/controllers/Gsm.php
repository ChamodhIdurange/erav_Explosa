<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Gsm extends CI_Controller {
    public function index(){
		$this->load->model('Gsminfo');
		$this->load->model('Commeninfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('gsm',$result);
	}
   
	public function Gsminsertupdate(){
		$this->load->model('Gsminfo');
        $result=$this->Gsminfo->Gsminsertupdate();
	}
	public function Gsmedit(){
		$this->load->model('Gsminfo');
        $result=$this->Gsminfo->Gsmedit();
	}
	public function Gsmstatus($x, $y){
		$this->load->model('Gsminfo');
        $result=$this->Gsminfo->Gsmstatus($x, $y);
	}
	public function GetGsmList(){
		$this->load->model('Gsminfo');
        $result=$this->Gsminfo->GetGsmList();
	}
	
}
