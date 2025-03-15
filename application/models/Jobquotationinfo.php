<?php class Jobquotationinfo extends CI_Model {

public function Jobquotationinsert() {
	$this->db->trans_begin();
	$userID = $_SESSION['userid'];

	$insertdatetime = date('Y-m-d H:i:s');
	$tableData=$this->input->post('tableData');
	$orderDate=$this->input->post('orderDate');
	$remarks=$this->input->post('remarks');

	$quotationTot = 0;
	$data = array(
		'orderdate'=> $orderDate, 
		'remarks'=> $remarks, 
		'accepted_status'=> '0', 
		'status'=> '1', 
		'insertdatetime'=> $insertdatetime, 
		'tbl_user_idtbl_user'=> $userID,
	);
	$this->db->insert('tbl_job_quotation', $data);
	$quotationId = $this->db->insert_id();

	foreach($tableData as $rowtabledata){
		$qty=$rowtabledata['col_2'];
		$comment=$rowtabledata['col_3'];
		$required_reel_amount=$rowtabledata['col_4'];
		$unitprice=$rowtabledata['col_7'];
		$totalprice=$rowtabledata['col_8'];
		$mainItemId=$rowtabledata['col_9'];
		$materialId=$rowtabledata['col_10'];
		
		$quotationTot += $totalprice;

		$detailData = array(
			'qty'=> $qty, 
			'comment'=> $comment, 
			'calculated_unitprice'=> $unitprice, 
			'required_reel_amount'=> $required_reel_amount, 
			'total_price'=> $totalprice, 
			'status'=> '1', 
			'insertdatetime'=> $insertdatetime, 
			'tbl_user_idtbl_user'=> $userID,
			'tbl_job_quotation_idtbl_job_quotation'=> $quotationId,
			'tbl_mainitems_idtbl_mainitems'=> $mainItemId,
			'tbl_row_material_idtbl_row_material'=> $materialId
		);
		$this->db->insert('tbl_job_quotation_details', $detailData);
	}

	$updateData = array(
		'quotation_total'=> $quotationTot, 
	);

	$this->db->where('idtbl_job_quotation', $quotationId);
	$this->db->update('tbl_job_quotation', $updateData);
	$this->db->trans_complete();

	if ($this->db->trans_status() === TRUE) {
		$this->db->trans_commit();
		
		$actionObj=new stdClass();
		$actionObj->icon='fas fa-save';
		$actionObj->title='';
		$actionObj->message='Record Added Successfully';
		$actionObj->url='';
		$actionObj->target='_blank';
		$actionObj->type='success';

		$actionJSON=json_encode($actionObj);
		
		$this->session->set_flashdata('msg', $actionJSON);
		echo $actionJSON;
	} else {
		$this->db->trans_rollback();

		$actionObj=new stdClass();
		$actionObj->icon='fas fa-warning';
		$actionObj->title='';
		$actionObj->message='Record Error';
		$actionObj->url='';
		$actionObj->target='_blank';
		$actionObj->type='danger';

		$actionJSON=json_encode($actionObj);
		
		$this->session->set_flashdata('msg', $actionJSON);
		echo $actionJSON;
	}
}


public function Deleteandacceptquotation($x, $y) {
	$this->db->trans_begin();

	$userID=$_SESSION['userid'];
	$recordID=$x;
	$type=$y;
	$updatedatetime=date('Y-m-d H:i:s');

	if($type==1) {
		$data=array(
			'accepted_status'=> '1',
			'updatedatetime'=> $updatedatetime);

		$this->db->where('idtbl_job_quotation', $recordID);
		$this->db->update('tbl_job_quotation', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status()===TRUE) {
			$this->db->trans_commit();

			$actionObj=new stdClass();
			$actionObj->icon='fas fa-check';
			$actionObj->title='';
			$actionObj->message='Record Activate Successfully';
			$actionObj->url='';
			$actionObj->target='_blank';
			$actionObj->type='success';

			$actionJSON=json_encode($actionObj);

			$this->session->set_flashdata('msg', $actionJSON);
			redirect('Jobquotation');
		}

		else {
			$this->db->trans_rollback();

			$actionObj=new stdClass();
			$actionObj->icon='fas fa-warning';
			$actionObj->title='';
			$actionObj->message='Record Error';
			$actionObj->url='';
			$actionObj->target='_blank';
			$actionObj->type='danger';

			$actionJSON=json_encode($actionObj);

			$this->session->set_flashdata('msg', $actionJSON);
			redirect('Jobquotation');
		}
	}

	else{
		$data=array(
			'status'=> '3',
			'updatedatetime'=> $updatedatetime)
			;

		$this->db->where('idtbl_job_quotation', $recordID);
		$this->db->update('tbl_job_quotation', $data);		$this->db->trans_complete();

		if ($this->db->trans_status()===TRUE) {
			$this->db->trans_commit();

			$actionObj=new stdClass();
			$actionObj->icon='fas fa-times';
			$actionObj->title='';
			$actionObj->message='Record Deactivate Successfully';
			$actionObj->url='';
			$actionObj->target='_blank';
			$actionObj->type='warning';

			$actionJSON=json_encode($actionObj);

			$this->session->set_flashdata('msg', $actionJSON);
			redirect('Jobquotation');
		}

		else {
			$this->db->trans_rollback();

			$actionObj=new stdClass();
			$actionObj->icon='fas fa-warning';
			$actionObj->title='';
			$actionObj->message='Record Error';
			$actionObj->url='';
			$actionObj->target='_blank';
			$actionObj->type='danger';

			$actionJSON=json_encode($actionObj);

			$this->session->set_flashdata('msg', $actionJSON);
			redirect('Jobquotation');
		}
	}
}

public function Jobquotationedit() {
	$recordID=$this->input->post('recordID');

	$this->db->select('*');
	$this->db->from('tbl_customer');
	$this->db->where('idtbl_customer', $recordID);
	$this->db->where('status', 1);

	$respond=$this->db->get();

	$obj=new stdClass();
	$obj->id=$respond->row(0)->idtbl_customer;
	$obj->name=$respond->row(0)->name;
	$obj->business_regno=$respond->row(0)->bus_reg_no;
	$obj->nbtno=$respond->row(0)->nbt_no;
	$obj->vat_customer=$respond->row(0)->vat_customer;
	$obj->svatno=$respond->row(0)->svat_no;
	$obj->telephoneno=$respond->row(0)->telephone_no;
	$obj->faxno=$respond->row(0)->fax_no;
	// $obj->nic=$respond->row(0)->nic;
	$obj->line1=$respond->row(0)->address_line1;
	$obj->line2=$respond->row(0)->address_line2;
	$obj->city=$respond->row(0)->city;
	$obj->state=$respond->row(0)->state;
	$obj->dline1=$respond->row(0)->delivery_address_line1;
	$obj->dline2=$respond->row(0)->delivery_address_line2;
	$obj->dcity=$respond->row(0)->delivery_city;
	$obj->dstate=$respond->row(0)->delivery_state;

	$obj->business_status=$respond->row(0)->business_status;
	$obj->payementmethod=$respond->row(0)->payment_method;
	// $obj->postal_code=$respond->row(0)->postal_code;
	// $obj->country=$respond->row(0)->country;
	$obj->vat_no=$respond->row(0)->vat_no;

	echo json_encode($obj);
}

public function Getquotationdetails() {
	$recordId=$this->input->post('recordId');

	$this->db->select('*');
	$this->db->from('tbl_job_quotation_details');
	$this->db->join('tbl_mainitems', 'tbl_job_quotation_details.tbl_mainitems_idtbl_mainitems = tbl_mainitems.idtbl_mainitems', 'left');
	$this->db->where('tbl_job_quotation_idtbl_job_quotation', $recordId);
	$this->db->where('tbl_job_quotation_details.status', 1);

	$respond=$this->db->get();

	echo json_encode($respond->result());
}
public function GetJobquotationList() {
	$this->db->select('idtbl_customer, name');
	$this->db->from('tbl_customer');
	$this->db->where('status', 1);

	return $respond=$this->db->get();
}

public function Getdetailsfrominquiry() {
	$inquiryId=$this->input->post('recordID');
	$mainArray = [];

	$this->db->select('*');
	$this->db->from('tbl_customerinquiry_detail');
	$this->db->join('tbl_mainitems', 'tbl_customerinquiry_detail.tbl_mainitems_idtbl_mainitems = tbl_mainitems.idtbl_mainitems', 'left');
	$this->db->where('tbl_customerinquiry_detail.status', 1);
	$this->db->where('tbl_customerinquiry_detail.tbl_customerinquiry_idtbl_customerinquiry', $inquiryId);
	
	$mainDetails = $this->db->get();

	foreach ($mainDetails->result() as $mainRow) {
        $calcDetails = $this->CalculateTotalAmount($mainRow->tbl_mainitems_idtbl_mainitems, $mainRow->qty);
		
		$obj=new stdClass();
		$obj->itemname=$mainRow->itemname;
		$obj->qty=$mainRow->qty;
		$obj->itemname=$mainRow->itemname;
		$obj->comments=$mainRow->comments;
		$obj->tbl_mainitems_idtbl_mainitems=$mainRow->tbl_mainitems_idtbl_mainitems;
		
		$obj->unitPrice=$calcDetails[0]->unitPrice;
		$obj->totalPrice=$calcDetails[0]->totalPrice;
		$obj->requiredAmount=$calcDetails[0]->requiredAmount;
		array_push($mainArray,$obj);

	}

	echo json_encode($mainArray);
}


public function CalculateTotalAmount($mainItemId, $qty) {
	$detailsArray = [];
	$requiredAmount = 0;
	// Get GSM values from GSM table and Get Price from material table
	$gsm = 5;

	$this->db->select('*');
	$this->db->from('tbl_mainitem_profile');
	$this->db->join('tbl_mainitem_profile_details', 'tbl_mainitem_profile.idtbl_mainitem_profile = tbl_mainitem_profile_details.tbl_mainitem_profile_idtbl_mainitem_profile', 'left');
	$this->db->join('tbl_row_material', 'tbl_mainitem_profile.tbl_row_material_idtbl_row_material = tbl_row_material.idtbl_row_material', 'left');
	$this->db->where('tbl_mainitem_profile.status', 1);
	$this->db->where('tbl_mainitem_profile.tbl_mainitems_idtbl_mainitems', $mainItemId);
	$profileDetails = $this->db->get();
	
	foreach ($profileDetails->result() as $profileRow) {
		// $this->db->select('*');
		// $this->db->from('tbl_gsm');
		// $this->db->where('status', 1);
		// $this->db->where('idtbl_gsm', $detailRow->tbl_gsm_idtbl_gsm);
		// $gsmquery = $this->db->get();
		// $gsmrow = $gsmquery->row(); 
		$measurmentInInches = $profileRow->reelsize * $profileRow->cutsize;
		$measurmentInMeters = $measurmentInInches / 39.37;

		$totalMeasuredAmount = ($measurmentInMeters * $gsm)/1000;
		$requiredAmount = $totalMeasuredAmount * $qty;

		$totalPrice =  $requiredAmount * 100;

		$objdetail=new stdClass();
		$objdetail->profileId=$profileRow->idtbl_mainitem_profile;
		$objdetail->materialId=$profileRow->tbl_row_material_idtbl_row_material;
		$objdetail->unitPrice=100;
		$objdetail->requiredAmount=$requiredAmount;
		$objdetail->totalPrice=$totalPrice;

		$objdetail->profileId=$profileRow->idtbl_mainitem_profile;

		array_push($detailsArray,$objdetail);
	}

	return $detailsArray; 
}

public function CalculateTotalAmountPublic() {
	$detailsArray = [];
	$mainItemId = $this->input->post('mainItemId');
	$qty = $this->input->post('qty');
	$requiredAmount = 0;
	// Get GSM values from GSM table and Get Price from material table
	$gsm = 5;

	$this->db->select('*');
	$this->db->from('tbl_mainitem_profile');
	$this->db->join('tbl_mainitem_profile_details', 'tbl_mainitem_profile.idtbl_mainitem_profile = tbl_mainitem_profile_details.tbl_mainitem_profile_idtbl_mainitem_profile', 'left');
	$this->db->join('tbl_row_material', 'tbl_mainitem_profile.tbl_row_material_idtbl_row_material = tbl_row_material.idtbl_row_material', 'left');
	$this->db->where('tbl_mainitem_profile.status', 1);
	$this->db->where('tbl_mainitem_profile.tbl_mainitems_idtbl_mainitems', $mainItemId);
	$profileDetails = $this->db->get();
	
	foreach ($profileDetails->result() as $profileRow) {
		// $this->db->select('*');
		// $this->db->from('tbl_gsm');
		// $this->db->where('status', 1);
		// $this->db->where('idtbl_gsm', $detailRow->tbl_gsm_idtbl_gsm);
		// $gsmquery = $this->db->get();
		// $gsmrow = $gsmquery->row(); 
		$measurmentInInches = $profileRow->reelsize * $profileRow->cutsize;
		$measurmentInMeters = $measurmentInInches / 39.37;

		$totalMeasuredAmount = ($measurmentInMeters * $gsm)/1000;
		$requiredAmount = $totalMeasuredAmount * $qty;

		$totalPrice =  $requiredAmount * 100;

		$objdetail=new stdClass();
		$objdetail->profileId=$profileRow->idtbl_mainitem_profile;
		$objdetail->materialId=$profileRow->tbl_row_material_idtbl_row_material;
		$objdetail->unitPrice=100;
		$objdetail->requiredAmount=$requiredAmount;
		$objdetail->totalPrice=$totalPrice;

		$objdetail->profileId=$profileRow->idtbl_mainitem_profile;

		array_push($detailsArray,$objdetail);
	}

	echo json_encode($detailsArray);

}

}