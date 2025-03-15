<?php
class Itemprofileinfo extends CI_Model{
    public function InsertUpdateItemProfile(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $tableData=$this->input->post('tableData');
        $materialTableData=$this->input->post('materialTableData');
        $machineTableData=$this->input->post('machineTableData');
        $width=$this->input->post('width');
        $height=$this->input->post('height');
        $length=$this->input->post('length');
        $reelsize=$this->input->post('reelsize');
        $cutsize=$this->input->post('cutsize');
        $actualreelsize=$this->input->post('actualreelsize');
        $actualcutsize=$this->input->post('actualcutsize');
        $materialId=$this->input->post('materialId');
        $innersize=$this->input->post('innersize');
        $outersize=$this->input->post('outersize');
        $cuttypeId=$this->input->post('cuttypeId');
        $noofups=$this->input->post('noofups');
       
        $mainitemId=$this->input->post('mainitemId');
        $flicount=$this->input->post('flicount');
        $recordOption=$this->input->post('recordOption');

        $updatedatetime=date('Y-m-d H:i:s');

        if($recordOption==1){
            $mainData = array(
                'width'=> $width, 
                'height'=> $height, 
                'length'=> $length, 
                'reelsize'=> $reelsize, 
                'cutsize'=> $cutsize, 
                'actualreelsize'=> $actualreelsize, 
                'actualcutsize'=> $actualcutsize, 
                'innersize'=> $innersize, 
                'outersize'=> $outersize, 
                'noofflies'=> $flicount, 
                'noofups'=> $noofups, 
                'status'=> '1', 
                'insertdatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
                'tbl_row_material_idtbl_row_material'=> $materialId,
                'tbl_cuttype_idtbl_cuttype'=> $cuttypeId,
                'tbl_mainitems_idtbl_mainitems'=> $mainitemId,
            );
            $this->db->insert('tbl_mainitem_profile', $mainData);
            $profileId = $this->db->insert_id();

            foreach($tableData as $rowtabledata){
                $fliposition=$rowtabledata['col_2'];
                $gsmId=$rowtabledata['col_4'];
                $fliId=$rowtabledata['col_5'];
                
                $detailData = array(
                    'fliposition'=> $fliposition, 
                    'status'=> '1', 
                    'insertdatetime'=> $updatedatetime, 
                    'tbl_user_idtbl_user'=> $userID,
                    'tbl_gsm_idtbl_gsm'=> $gsmId,
                    'tbl_flidata_idtbl_flidata'=> $fliId,
                    'tbl_mainitem_profile_idtbl_mainitem_profile'=> $profileId
                );
                $this->db->insert('tbl_mainitem_profile_details', $detailData);
            }
            foreach($materialTableData as $rowmaterialData){
                $qty=$rowmaterialData['col_2'];
                $materialId=$rowmaterialData['col_3'];
                
                $detailData = array(
                    'requiredqty'=> $qty, 
                    'status'=> '1', 
                    'insertdatetime'=> $updatedatetime, 
                    'tbl_user_idtbl_user'=> $userID,
                    'tbl_row_material_idtbl_row_material'=> $materialId,
                    'tbl_mainitem_profile_idtbl_mainitem_profile'=> $profileId
                );
                $this->db->insert('tbl_profile_material_details', $detailData);
            }
            foreach($machineTableData as $rowmachineData){
                $sequence=$rowmachineData['col_1'];
                $machineId=$rowmachineData['col_3'];
                
                $detailData = array(
                    'sequence'=> $sequence, 
                    'status'=> '1', 
                    'insertdatetime'=> $updatedatetime, 
                    'tbl_user_idtbl_user'=> $userID,
                    'tbl_machine_idtbl_machine'=> $machineId,
                    'tbl_mainitem_profile_idtbl_mainitem_profile'=> $profileId
                );
                $this->db->insert('tbl_profile_machine_details', $detailData);
            }


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
                
               echo $actionJSON;
            }
        }
        else{
            $data = array(
                'itemname'=> $itemname, 
                'updatedatetime'=> $updatedatetime,
                'tbl_user_idtbl_user'=> $userID,
                'tbl_supplier_idtbl_supplier'=> $supplier,
                'tbl_customer_idtbl_customer'=> $customer
            );

            $this->db->where('idtbl_mainitems', $recordID);
            $this->db->update('tbl_mainitems', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-save';
                $actionObj->title='';
                $actionObj->message='Record Update Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='primary';

                $actionJSON=json_encode($actionObj);
                
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
                
                echo $actionJSON;
        
            }
        }
    }
    public function CheckItemProfile(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];
        $updatedatetime=date('Y-m-d H:i:s');
        $detailsArray = [];
        $materialDetailsArray = [];
        $machineDetailsArray = [];

        $itemId=$this->input->post('itemId');

        $this->db->select('*');
		$this->db->from('tbl_mainitem_profile');
		$this->db->where('status', 1);
		$this->db->where('tbl_mainitems_idtbl_mainitems', $itemId);
     

        $query = $this->db->get();

        if ($query->num_rows() <= 0) {
            $obj=new stdClass();
            $obj->recordOption=1;
        } else {
            $row = $query->row(); 

            $this->db->select('*');
            $this->db->from('tbl_mainitem_profile_details');
            $this->db->where('status', 1);
            $this->db->where('tbl_mainitem_profile_idtbl_mainitem_profile', $row->idtbl_mainitem_profile);
            $querydetails = $this->db->get();
           
            $this->db->select('*');
            $this->db->from('tbl_profile_material_details');
            $this->db->where('status', 1);
            $this->db->where('tbl_mainitem_profile_idtbl_mainitem_profile', $row->idtbl_mainitem_profile);
            $materialdetails = $this->db->get();
          
            

            foreach ($querydetails->result() as $detailRow) {
                $this->db->select('*');
                $this->db->from('tbl_gsm');
                $this->db->where('status', 1);
                $this->db->where('idtbl_gsm', $detailRow->tbl_gsm_idtbl_gsm);
                $gsmquery = $this->db->get();
                $gsmrow = $gsmquery->row(); 
           
                $this->db->select('*');
                $this->db->from('tbl_flidata');
                $this->db->where('status', 1);
                $this->db->where('idtbl_flidata', $detailRow->tbl_flidata_idtbl_flidata);
                $fliquery = $this->db->get();
                $flirow = $fliquery->row();

                $objdetail=new stdClass();
                $objdetail->profileId=$detailRow->idtbl_mainitem_profile_details ;
                $objdetail->gsmname=$gsmrow->gsmname;;
                $objdetail->gsmId=$detailRow->tbl_gsm_idtbl_gsm;
                $objdetail->fliname=$flirow->fli_name ;
                $objdetail->fliId=$detailRow->tbl_flidata_idtbl_flidata ;
                $objdetail->fliposition=$detailRow->fliposition ;
                array_push($detailsArray,$objdetail);
            }

            $this->db->select('*');
            $this->db->from('tbl_profile_material_details');
            $this->db->where('status', 1);
            $this->db->where('tbl_mainitem_profile_idtbl_mainitem_profile', $row->idtbl_mainitem_profile);
            $materialdetails = $this->db->get();

            foreach ($materialdetails->result() as $materialDetailsRow) {
                $this->db->select('*');
                $this->db->from('tbl_row_material');
                $this->db->where('status', 1);
                $this->db->where('idtbl_row_material', $materialDetailsRow->tbl_row_material_idtbl_row_material);
                $materialQuery = $this->db->get();
                $materialRow = $materialQuery->row(); 


                $objmaterialdetail=new stdClass();
                $objmaterialdetail->materialDetailId=$materialDetailsRow->idtbl_profile_material_details ;
                $objmaterialdetail->requiredqty=$materialDetailsRow->requiredqty ;
                $objmaterialdetail->materialId=$materialDetailsRow->tbl_row_material_idtbl_row_material ;
                $objmaterialdetail->materialname=$materialRow->material_name ;

                array_push($materialDetailsArray,$objmaterialdetail);
            }
          
            $this->db->select('*');
            $this->db->from('tbl_profile_machine_details');
            $this->db->where('status', 1);
            $this->db->where('tbl_mainitem_profile_idtbl_mainitem_profile', $row->idtbl_mainitem_profile);
            $machineDetails = $this->db->get();

            foreach ($machineDetails->result() as $machineDetailRow) {
                $this->db->select('*');
                $this->db->from('tbl_machine');
                $this->db->where('status', 1);
                $this->db->where('idtbl_machine', $machineDetailRow->tbl_machine_idtbl_machine);
                $machineQuery = $this->db->get();
                $machineRow = $machineQuery->row(); 


                $objmachineDetails=new stdClass();
                $objmachineDetails->machineDetailId=$machineDetailRow->idtbl_profile_machine_details ;
                $objmachineDetails->sequence=$machineDetailRow->sequence ;
                $objmachineDetails->machineId=$machineDetailRow->tbl_machine_idtbl_machine ;
                $objmachineDetails->machineName=$machineRow->machine ;

                array_push($machineDetailsArray,$objmachineDetails);
            }

            $obj=new stdClass();
            $obj->recordOption=2;
            $obj->width=$row->width;
            $obj->height=$row->height;
            $obj->length=$row->length;
            $obj->reelsize=$row->reelsize;
            $obj->cutsize=$row->cutsize;
            $obj->actualreelsize=$row->actualreelsize;
            $obj->actualcutsize=$row->actualcutsize;
            $obj->noofflies=$row->noofflies;
            $obj->noofups=$row->noofups;
            $obj->materialId=$row->tbl_row_material_idtbl_row_material;
            $obj->detailsArray=$detailsArray;
            $obj->materialDetailsArray=$materialDetailsArray;
            $obj->machineDetailsArray=$machineDetailsArray;
        }

        echo json_encode($obj);

    }

    public function GetCustomersforselect2() {
        if(!isset($_POST['searchTerm'])){ 
            $this->db->select('idtbl_customer, name');
            $this->db->from('tbl_customer');
            $this->db->where('status', 1);
            $this->db->limit(5);
        
        }else{
            $search = $_POST['searchTerm'];   

            $this->db->select('idtbl_customer, name');
            $this->db->from('tbl_customer');
            $this->db->where('status', 1);
            $this->db->like('name', $search); 
            $this->db->limit(5);
        }
        $query = $this->db->get();
        $arraylist=array();

        foreach ($query->result() as $detailRow) {
            $obj=new stdClass();
            $obj->id=$detailRow->idtbl_customer;
            $obj->text=$detailRow->name;
            
            array_push($arraylist, $obj);
        }
      
        echo json_encode($arraylist);
    }
  
    public function GetProductAccoCustomerSelect2() {
        $customerId = $_POST['customerId'];

        if(!isset($_POST['searchTerm'])){ 
            $this->db->select('idtbl_mainitems, itemname');
            $this->db->from('tbl_mainitems');
            $this->db->where('status', 1);
            $this->db->like('tbl_customer_idtbl_customer', $customerId); 
            $this->db->limit(5);
        
        }else{
            $search = $_POST['searchTerm'];   

            $this->db->select('idtbl_mainitems, itemname');
            $this->db->from('tbl_mainitems');
            $this->db->where('status', 1);
            $this->db->like('itemname', $search); 
            $this->db->like('tbl_customer_idtbl_customer', $customerId); 
            $this->db->limit(5);
        }
        $query = $this->db->get();
        $arraylist=array();

        foreach ($query->result() as $detailRow) {
            $obj=new stdClass();
            $obj->id=$detailRow->idtbl_mainitems;
            $obj->text=$detailRow->itemname;
            
            array_push($arraylist, $obj);
        }
      
        echo json_encode($arraylist);
    }
}
