<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Jobquotation extends CI_Controller {
    public function index(){
		$this->load->model('Jobquotationinfo');
		$this->load->model('Commeninfo');
		$this->load->model('Customerinquiryinfo');
		$this->load->model('Mainitemsinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$result['inquirylist']=$this->Customerinquiryinfo->Getinquirylist();
		$result['mainitemlist']=$this->Mainitemsinfo->GetMainItemList();
		$this->load->view('jobquotation',$result);
	}
   
	public function Jobquotationinsert(){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->Jobquotationinsert();
	}
	public function Jobquotationedit(){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->Jobquotationedit();
	}
	public function Deleteandacceptquotation($x, $y){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->Deleteandacceptquotation($x, $y);
	}
	public function CalculateTotalAmountPublic(){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->CalculateTotalAmountPublic();
	}
	public function Getdetailsfrominquiry(){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->Getdetailsfrominquiry();
	}
	public function Getquotationdetails(){
		$this->load->model('Jobquotationinfo');
        $result=$this->Jobquotationinfo->Getquotationdetails();
	}
	
}
