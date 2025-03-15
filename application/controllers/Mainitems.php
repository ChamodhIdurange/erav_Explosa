<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Mainitems extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Mainitemsinfo');
        $this->load->model('Supplierinfo');
        $this->load->model('Customerinfo');
		$result['supplierlist']=$this->Supplierinfo->GetSupplierList();
		$result['customerlist']=$this->Customerinfo->GetCustomerList();
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('mainitems', $result);
	}
    public function Mainiteminsertupdate(){
		$this->load->model('Mainitemsinfo');
        $result=$this->Mainitemsinfo->Mainiteminsertupdate();
	}
    public function Mainitemstatus($x, $y){
		$this->load->model('Mainitemsinfo');
        $result=$this->Mainitemsinfo->Mainitemstatus($x, $y);
	}
    public function Mainitemedit(){
		$this->load->model('Mainitemsinfo');
        $result=$this->Mainitemsinfo->Mainitemedit();
	}
    public function GetMainItemList(){
		$this->load->model('Mainitemsinfo');
        $result=$this->Mainitemsinfo->GetMainItemList();
	}
}