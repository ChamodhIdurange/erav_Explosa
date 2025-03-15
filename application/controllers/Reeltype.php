<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Reeltype extends CI_Controller {
    public function index(){
		$this->load->model('Reeltypeinfo');
		$this->load->model('Gsminfo');
		$this->load->model('Commeninfo');
		$result['gsmlist']=$this->Gsminfo->Getgsmlist();
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('reeltype',$result);
	}
   
	public function Reeltypeinsertupdate(){
		$this->load->model('Reeltypeinfo');
        $result=$this->Reeltypeinfo->Reeltypeinsertupdate();
	}
	public function Reeltypeedit(){
		$this->load->model('Reeltypeinfo');
        $result=$this->Reeltypeinfo->Reeltypeedit();
	}
	public function Reeltypestatus($x, $y){
		$this->load->model('Reeltypeinfo');
        $result=$this->Reeltypeinfo->Reeltypestatus($x, $y);
	}
	
}
