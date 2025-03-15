<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Goodreceive extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Goodreceiveinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$result['porderlist']=$this->Goodreceiveinfo->GetPorderList();
		
		$this->load->view('goodreceive', $result);
	}
	public function GetPoDetails(){
		$this->load->model('Goodreceiveinfo');
        $result=$this->Goodreceiveinfo->GetPoDetails();
	}
	public function SaveNewGrn(){
		$this->load->model('Goodreceiveinfo');
        $result=$this->Goodreceiveinfo->SaveNewGrn();
	}
	public function GetGrnList(){
		$this->load->model('Goodreceiveinfo');
        $result=$this->Goodreceiveinfo->GetGrnList();
	}
}