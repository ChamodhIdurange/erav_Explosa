<?php
class Customerinquiryinfo extends CI_Model{

    public function Getmeasuretype() {
		$this->db->select('`idtbl_mesurements`, `measure_type`');
		$this->db->from('tbl_measurements');
		$this->db->where('status', 1);

		return $respond=$this->db->get();
	}
    public function Customerinquiryinsertupdate(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $date=$this->input->post('date');
		$customer=$this->input->post('customer');
		$tableData = $this->input->post('tableData');
		
        $recordOption=$this->input->post('recordOption');
        if(!empty($this->input->post('recordID'))){$recordID=$this->input->post('recordID');}

        $insertdatetime=date('Y-m-d H:i:s');

        if($recordOption==1){
            $data = array(
                'date'=> $date, 
				'tbl_customer_idtbl_customer'=> $customer, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->insert('tbl_customerinquiry', $data);

			$insertId = $this->db->insert_id();

            foreach($tableData as $rowtabledata){
                $qty = $rowtabledata['col_2'];
                $comment = $rowtabledata['col_3'];
                $insertMethod = $rowtabledata['col_4'];
                $itemId = $rowtabledata['col_5'];

                $data = array(
                    'qty'=> $rowtabledata['col_2'],
                    'comments'=> $rowtabledata['col_5'], 
                    'status'=> '1', 
                    'insertdatetime'=> $insertdatetime, 
                    'tbl_user_idtbl_user'=> $userID,
                    'tbl_mainitems_idtbl_mainitems'=> $itemId,
                    'tbl_customerinquiry_idtbl_customerinquiry'=> $insertId, 
                );
                $this->db->insert('tbl_customerinquiry_detail', $data);
            }
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
	
				$obj=new stdClass();
				$obj->status=1;          
				$obj->action=$actionJSON;  
				
				echo json_encode($obj);
			} else {
				$this->db->trans_rollback();
	
				$actionObj=new stdClass();
				$actionObj->icon='fas fa-exclamation-triangle';
				$actionObj->title='';
				$actionObj->message='Record Error';
				$actionObj->url='';
				$actionObj->target='_blank';
				$actionObj->type='danger';
	
				$actionJSON=json_encode($actionObj);
	
				$obj=new stdClass();
				$obj->status=0;          
				$obj->action=$actionJSON;  
				
				echo json_encode($obj);
			}

        }
        else{
            $data = array(
                'date'=> $date, 
				'tbl_customer_idtbl_customer'=> $customer, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->where('idtbl_customerinquiry', $recordID);
            $this->db->update('tbl_customerinquiry', $data);

			foreach($tableData as $rowtabledata){
                $qty = $rowtabledata['col_2'];
                $comment = $rowtabledata['col_3'];
                $insertMethod = $rowtabledata['col_4'];
                $itemId = $rowtabledata['col_5'];
                $inquirydetailId = $rowtabledata['col_6'];
                
                if($insertMethod==0){
                    $inquiryID = $rowtabledata['col_9'];
                    // $jobID = $rowtabledata['col_7'];
                    $data = array(
                        'qty'=> $qty,
                        'comments'=> $comment, 
                        'status'=> '1', 
                        'insertdatetime'=> $insertdatetime, 
                        'tbl_user_idtbl_user'=> $userID,
                        'tbl_mainitems_idtbl_mainitems'=> $itemId,
                        'tbl_customerinquiry_idtbl_customerinquiry'=> $recordID, 
                    );
                    $this->db->insert('tbl_customerinquiry_detail', $data);
                }else if($insertMethod==1){
                    $data = array(
					    'qty'=> $qty,
                        'comments'=> $comment, 
                        'status'=> '1', 
                        'updatedatetime'=> $insertdatetime, 
                        'tbl_user_idtbl_user'=> $userID,
                        'tbl_mainitems_idtbl_mainitems'=> $itemId,
                        'tbl_customerinquiry_idtbl_customerinquiry'=> $recordID,
                    );

                    $this->db->where('idtbl_customerinquiry_detail', $inquirydetailId);
                    $this->db->update('tbl_customerinquiry_detail', $data);
                }
            }
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
	
				$obj=new stdClass();
				$obj->status=1;          
				$obj->action=$actionJSON;  
				
				echo json_encode($obj);
			} else {
				$this->db->trans_rollback();
	
				$actionObj=new stdClass();
				$actionObj->icon='fas fa-exclamation-triangle';
				$actionObj->title='';
				$actionObj->message='Record Error';
				$actionObj->url='';
				$actionObj->target='_blank';
				$actionObj->type='danger';
	
				$actionJSON=json_encode($actionObj);
	
				$obj=new stdClass();
				$obj->status=0;          
				$obj->action=$actionJSON;  
				
				echo json_encode($obj);
			}
        }
    }
    public function Customerinquirystatus($x, $y){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];
        $recordID=$x;
        $type=$y;
        $updatedatetime=date('Y-m-d H:i:s');

        if($type==1){
            $data = array(
                'status' => '1',
                'tbl_user_idtbl_user'=> $userID, 
                'updatedatetime'=> $updatedatetime
            );

			$this->db->where('idtbl_customerinquiry', $recordID);
            $this->db->update('tbl_customerinquiry', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
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
                redirect('Customerinquiry');                
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
                redirect('Customerinquiry');
            }
        }
        else if($type==2){
            $data = array(
                'status' => '2',
                'tbl_user_idtbl_user'=> $userID, 
                'updatedatetime'=> $updatedatetime
            );

			$this->db->where('idtbl_customerinquiry', $recordID);
            $this->db->update('tbl_customerinquiry', $data);


            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
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
                redirect('Customerinquiry');                
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
                redirect('Customerinquiry');
            }
        }
        else if($type==3){
			$data = array(
                'status' => '3',
                'tbl_user_idtbl_user'=> $userID, 
                'updatedatetime'=> $updatedatetime
            );

			$this->db->where('idtbl_customerinquiry', $recordID);
            $this->db->update('tbl_customerinquiry', $data);


            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-trash-alt';
                $actionObj->title='';
                $actionObj->message='Record Remove Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Customerinquiry');                
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
                redirect('Customerinquiry');
            }
        }
    }
    public function Customerinquiryapprove($x){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];
        $recordID=$x;
        $updatedatetime=date('Y-m-d H:i:s');

        $data = array(
            'approvestatus' => '1',
            'tbl_user_idtbl_user'=> $userID, 
            'updatedatetime'=> $updatedatetime
        );

        $this->db->where('idtbl_customerinquiry', $recordID);
        $this->db->update('tbl_customerinquiry', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
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
            redirect('Customerinquiry');                
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
            redirect('Customerinquiry');
        }
    }
    public function Customerinquiryedit(){
        $recordID=$this->input->post('recordID');

        $this->db->select('*');
        $this->db->from('tbl_customerinquiry');
        $this->db->where('idtbl_customerinquiry', $recordID);
        $this->db->where('status', 1);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->id=$respond->row(0)->idtbl_customerinquiry;
        $obj->date=$respond->row(0)->date;
		$obj->customer=$respond->row(0)->tbl_customer_idtbl_customer;

        echo json_encode($obj);
    }
    public function Getcustomeritems() {
        $recordID = $this->input->post('recordID');
    
        $this->db->select('idtbl_mainitems, itemname');
        $this->db->from('tbl_mainitems');
        $this->db->where('tbl_mainitems.status', 1);
        $this->db->where('tbl_mainitems.tbl_customer_idtbl_customer', $recordID);
    
        $respond = $this->db->get();
        echo json_encode($respond->result());
    }
    public function GetAllCustomerInquiries(){
        $this->db->select('*');
        $this->db->from('tbl_customerinquiry');
        $this->db->join('tbl_customer', 'tbl_customer.idtbl_customer = tbl_customerinquiry.tbl_customer_idtbl_customer');
        $this->db->where('tbl_customerinquiry.status', 1);

        return $respond=$this->db->get();
    }
	public function Customerinquiryjobedit(){
        $recordID=$this->input->post('recordID');

        $html='';
		$sql="SELECT * FROM `tbl_customerinquiry_detail` LEFT JOIN `tbl_customerinquiry` ON `tbl_customerinquiry`.`idtbl_customerinquiry`=`tbl_customerinquiry_detail`.`tbl_customerinquiry_idtbl_customerinquiry` LEFT JOIN `tbl_mainitems` ON `tbl_mainitems`.`idtbl_mainitems`=`tbl_customerinquiry_detail`.`tbl_mainitems_idtbl_mainitems` WHERE `tbl_customerinquiry_idtbl_customerinquiry`= '$recordID'";
        $respond=$this->db->query($sql, array(1, $recordID));
              
        foreach($respond->result() as $rowlist){
           
            $html.='
            <tr>
                <td class="text-left">'.$rowlist->itemname.'</td>
                <td class="text-left">'.$rowlist->qty.'</td>
                <td class="text-left">'.$rowlist->comments.'</td>
                <td class="d-none">1</td>
                <td class="d-none"> '.$rowlist->tbl_mainitems_idtbl_mainitems.'</td>
                <td class="d-none hiddendetailid" name="hiddendetailid"> '.$rowlist->idtbl_customerinquiry_detail.'</td>
                <td class="text-right"><button type="button" id="'.$rowlist->idtbl_customerinquiry_detail.'" class="btnEditlist btn btn-primary btn-sm float-right" data-toggle="modal">
                <i class="fas fa-pen"></i>
              </button>
              </td>
             </tr>
            ';
            
        }

        echo ($html);


    }
	public function Customerinquiryjoblistedit(){
        $recordID=$this->input->post('recordID');
        $this->db->select('*');
        $this->db->from('tbl_customerinquiry_detail');
        $this->db->where('idtbl_customerinquiry_detail', $recordID);
        $this->db->where('tbl_customerinquiry_detail.status', 1);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->id=$respond->row(0)->idtbl_customerinquiry_detail;
        $obj->qty=$respond->row(0)->qty;
        $obj->comments=$respond->row(0)->comments;
        $obj->idtbl_customerinquiry=$respond->row(0)->tbl_customerinquiry_idtbl_customerinquiry;
        $obj->itemId=$respond->row(0)->tbl_mainitems_idtbl_mainitems;
        echo json_encode($obj);
    }

    public function Getinquirylist(){
        $this->db->select('tbl_customerinquiry.idtbl_customerinquiry, tbl_customer.name');
        $this->db->from('tbl_customerinquiry');
        $this->db->join('tbl_customer', 'tbl_customer.idtbl_customer = tbl_customerinquiry.tbl_customer_idtbl_customer');
        $this->db->where('tbl_customerinquiry.status', 1);

        return $respond=$this->db->get();

    }
    
    public function Customerinquiryviewjoblist(){
        $recordID=$this->input->post('recordID');
        $html='';
		$sql="SELECT * FROM `tbl_customerinquiry_detail` LEFT JOIN `tbl_customerinquiry` ON `tbl_customerinquiry`.`idtbl_customerinquiry`=`tbl_customerinquiry_detail`.`tbl_customerinquiry_idtbl_customerinquiry` LEFT JOIN `tbl_mainitems` ON `tbl_mainitems`.`idtbl_mainitems`=`tbl_customerinquiry_detail`.`tbl_mainitems_idtbl_mainitems` WHERE `tbl_customerinquiry_idtbl_customerinquiry`= '$recordID'";
        $respond=$this->db->query($sql, array(1, $recordID));

        foreach($respond->result() as $rowlist){
            $html.='
            <tr id ="'.$rowlist->idtbl_customerinquiry_detail.'">
                <td>'.$rowlist->itemname.'</td>
                <td>'.$rowlist->qty.'</td>
                <td>'.$rowlist->comments.'</td>
             </tr>
            
            ';
        }
        echo ($html);
    }
}
