<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Purchaseorder extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Purchaseorderinfo');
        $this->load->model('Rowmaterialsinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$result['materiallist']=$this->Rowmaterialsinfo->GetMaterialList();
		$this->load->view('purchaseorder', $result);
	}
    public function Porderinsert(){
		$this->load->model('Purchaseorderinfo');
        $result=$this->Purchaseorderinfo->Porderinsert();
	}
    public function ConfirmPorder($x, $y){
		$this->load->model('Purchaseorderinfo');
        $result=$this->Purchaseorderinfo->ConfirmPorder($x, $y);
	}
    public function GetUnitpriceAccoMaterial(){
		$this->load->model('Purchaseorderinfo');
        $result=$this->Purchaseorderinfo->GetUnitpriceAccoMaterial();
	}
    public function PorderdetailsView(){
		$this->load->model('Purchaseorderinfo');
        $result=$this->Purchaseorderinfo->PorderdetailsView();
	}
}