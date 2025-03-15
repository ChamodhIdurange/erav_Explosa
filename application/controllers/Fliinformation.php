<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Fliinformation extends CI_Controller {
    public function index(){
		$this->load->model('Fliinformationinfo');
		$this->load->model('Commeninfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('fliinformation',$result);
	}
   
	public function Fliinformationinsertupdate(){
		$this->load->model('Fliinformationinfo');
        $result=$this->Fliinformationinfo->Fliinformationinsertupdate();
	}
	public function Fliinformationedit(){
		$this->load->model('Fliinformationinfo');
        $result=$this->Fliinformationinfo->Fliinformationedit();
	}
	public function Fliinformationstatus($x, $y){
		$this->load->model('Fliinformationinfo');
        $result=$this->Fliinformationinfo->Fliinformationstatus($x, $y);
	}
	public function GetFliList(){
		$this->load->model('Fliinformationinfo');
        $result=$this->Fliinformationinfo->GetFliList();
	}
	
}
