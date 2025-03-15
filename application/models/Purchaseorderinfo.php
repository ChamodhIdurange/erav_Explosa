<?php
class Purchaseorderinfo extends CI_Model{


    public function GetUnitpriceAccoMaterial(){
        $recordID=$this->input->post('recordID');

        $this->db->select('`unitprice`');
        $this->db->from('tbl_row_material');
        $this->db->where('status', 1);
        $this->db->where('idtbl_row_material', $recordID);
        $respond=$this->db->get();

        echo json_encode($respond->result());
    }
    public function Porderinsert(){
        $this->db->trans_begin();
        $userID=$_SESSION['userid'];

        $tableData=$this->input->post('tableData');
        $orderdate=$this->input->post('orderdate');
        $total=$this->input->post('total');
        $remark=$this->input->post('remark');

        $updatedatetime=date('Y-m-d H:i:s');

        $data = array(
            'podate'=> $orderdate, 
            'total'=> $total, 
            'status'=> '1', 
            'confirmedstatus'=> '0', 
            'insertdatetime'=> $updatedatetime, 
            'tbl_user_idtbl_user'=> $userID,
            'remarks'=> $remark,
        );

        $this->db->insert('tbl_porder', $data);

        $porderid=$this->db->insert_id();

        foreach($tableData as $rowtabledata){
            $unitprice=$rowtabledata['col_2'];
            $qty=$rowtabledata['col_3'];
            $materialid=$rowtabledata['col_5'];
            $totalsum=$rowtabledata['col_6'];

            $dataone = array(
                'qty'=> $qty, 
                'unitprice'=> $unitprice, 
                'totalvalue'=> $totalsum, 
                'tbl_row_material_idtbl_row_material'=> $materialid,
                'tbl_porder_idtbl_porder'=> $porderid,
            );
            $this->db->insert('tbl_porder_detail', $dataone);
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
    
    public function PorderdetailsView(){
        $recordID=$this->input->post('recordID');

        $this->db->select('tbl_porder_detail.totalvalue, tbl_porder_detail.unitprice, tbl_porder_detail.qty, tbl_row_material.material_name');
        $this->db->from('tbl_porder');
        $this->db->join('tbl_porder_detail', 'tbl_porder.idtbl_porder = tbl_porder_detail.tbl_porder_idtbl_porder', 'left');
        $this->db->join('tbl_row_material', 'tbl_row_material.idtbl_row_material = tbl_porder_detail.tbl_row_material_idtbl_row_material', 'left');
        $this->db->where('tbl_porder.idtbl_porder', $recordID);
        $this->db->where('tbl_porder.status', 1);

        $responddetail=$this->db->get();

        $html='';
        $html.='
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($responddetail->result() as $rowdetail){
                        $html.='<tr>
                            <td>'.$rowdetail->material_name.'</td>
                            <td>'.$rowdetail->unitprice.'</td>
                            <td>'.$rowdetail->qty.'</td>
                            <td>'.$rowdetail->totalvalue.'</td>
                        </tr>';
                    }
                    $html.='</tbody>
                </table>
            </div>
        </div>
        ';

        echo $html;
    }
    public function ConfirmPorder($x, $y){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];
        $recordID=$x;
        $type=$y;
        $updatedatetime=date('Y-m-d H:i:s');

        if($type==1){
            $data = array(
                'confirmedstatus' => '1',
                'updatedatetime'=> $updatedatetime
            );

            $this->db->where('idtbl_porder', $recordID);
            $this->db->update('tbl_porder', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-check';
                $actionObj->title='';
                $actionObj->message='Porder is Confirmed';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='success';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Purchaseorder');                
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
                redirect('Purchaseorder');
            }
        }
    }
}

