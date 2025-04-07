<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Itemprofile extends CI_Controller {
    public function index(){
		$this->load->model('Itemprofileinfo');
		$this->load->model('Commeninfo');
		$this->load->model('Gsminfo');
		$this->load->model('Rowmaterialsinfo');
		$this->load->model('Mainitemsinfo');
		$this->load->model('Fliinformationinfo');
		$this->load->model('Cuttypeinfo');
		$this->load->model('Cartontypeinfo');
		$this->load->model('Machineinfo');
		$result['gsmlist']=$this->Gsminfo->GetGsmList();
		$result['materiallist']=$this->Rowmaterialsinfo->GetMaterialList();
		$result['mainitemlist']=$this->Mainitemsinfo->GetMainItemList();
		$result['flilist']=$this->Fliinformationinfo->GetFliList();
		$result['cuttypelist']=$this->Cuttypeinfo->GetCuttypeList();
		$result['machinelist']=$this->Machineinfo->GetMachineList();
		$result['cartontypelist']=$this->Cartontypeinfo->Getcartontypelist();
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();

		$this->load->view('itemprofile',$result);
	}

	public function InsertUpdateItemProfile(){
		$this->load->model('Itemprofileinfo');
        $result=$this->Itemprofileinfo->InsertUpdateItemProfile();
	}
	
	public function CheckItemProfile(){
		$this->load->model('Itemprofileinfo');
        $result=$this->Itemprofileinfo->CheckItemProfile();
	}
	public function GetCustomersforselect2(){
		$this->load->model('Itemprofileinfo');
        $result=$this->Itemprofileinfo->GetCustomersforselect2();
	}
	public function GetProductAccoCustomerSelect2(){
		$this->load->model('Itemprofileinfo');
        $result=$this->Itemprofileinfo->GetProductAccoCustomerSelect2();
	}
	
}
