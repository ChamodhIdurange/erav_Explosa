<?php
class Goodreceiveinfo extends CI_Model{

    public function GetPorderList(){
        $this->db->select('idtbl_porder, podate');
        $this->db->from('tbl_porder');
        $this->db->where('status', 1);
        $this->db->where('confirmedstatus', 1);
        $this->db->where('completedstatus', 0);

        return $respond=$this->db->get();
    }

    public function GetPoDetails(){
        $recordID=$this->input->post('recordID');

        $this->db->select('tbl_porder_detail.totalvalue, tbl_porder_detail.unitprice, tbl_porder_detail.qty, tbl_row_material.material_name, tbl_row_material.idtbl_row_material');
        $this->db->from('tbl_porder');
        $this->db->join('tbl_porder_detail', 'tbl_porder.idtbl_porder = tbl_porder_detail.tbl_porder_idtbl_porder', 'left');
        $this->db->join('tbl_row_material', 'tbl_row_material.idtbl_row_material = tbl_porder_detail.tbl_row_material_idtbl_row_material', 'left');
        $this->db->where('tbl_porder.idtbl_porder', $recordID);
        $this->db->where('tbl_porder.status', 1);

        $responddetail=$this->db->get();

        $html='';
        foreach($responddetail->result() as $rowdetail){
            $html.='<tr>
                <td>'.$rowdetail->material_name.'</td>
                <td class="text-right">'.number_format($rowdetail->unitprice, 2).'</td>
                <td class="text-right editnewqty">'.$rowdetail->qty.'</td>
                <td class="text-right ">'.number_format($rowdetail->totalvalue, 2).'</td>
                <td class="d-none">'.$rowdetail->unitprice.'</td>
                <td class="d-none total">'.$rowdetail->totalvalue.'</td>
                <td class="d-none total">'.$rowdetail->idtbl_row_material.'</td>
                </tr>';
        };
                    

        echo $html;
    }
 
    public function GetGrnList(){
        $this->db->select('tbl_grn.*');
        $this->db->from('tbl_grn');
        $this->db->where('tbl_grn.status', 1);

        $responddetail=$this->db->get();

        $html='';
        $html.='
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice number</th>
                            <th>Dispatch Number</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($responddetail->result() as $rowdetail){
                        $formattedDate = date('d-M-Y', strtotime($rowdetail->date)); 
                        $formattedTotal = number_format($rowdetail->total); 

                        $html.='<tr>
                            <td>'.$rowdetail->idtbl_grn.'</td>
                            <td>'.$formattedDate.'</td>
                            <td>'.$rowdetail->invoicenum.'</td>
                            <td>'.$rowdetail->dispatchnum.'</td>
                            <td class = "text-right">'.$formattedTotal.'</td>
                        </tr>';
                    }
                    $html.='</tbody>
                </table>
            </div>
        </div>
        ';

        echo $html;
    }
 
    public function SaveNewGrn(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $tableData=$this->input->post('tableData');
        $ponumber=$this->input->post('ponumber');
        $grndate=$this->input->post('grndate');
        $grninvoice=$this->input->post('grninvoice');
        $grndispatch=$this->input->post('grndispatch');
        $grnnettotal=$this->input->post('grnnettotal');

        $updatedatetime=date('Y-m-d H:i:s');

        $data = array(
            'date'=> $grndate, 
            'total'=> $grnnettotal, 
            'invoicenum'=> $grninvoice, 
            'dispatchnum'=> $grndispatch, 
            'status'=> '1', 
            'updatedatetime'=> $updatedatetime, 
            'tbl_user_idtbl_user'=> $userID
        );

        $this->db->insert('tbl_grn', $data);

        $grnid=$this->db->insert_id();

        $data = array(
            'completedstatus' => '1',
            'updatedatetime'=> $updatedatetime
        );

        $this->db->where('idtbl_porder', $ponumber);
        $this->db->update('tbl_porder', $data);

        foreach($tableData as $rowtabledata){
            $unitprice=$rowtabledata['col_5'];
            $qty=$rowtabledata['col_3'];
            $materialid=$rowtabledata['col_7'];
            $totalsum=$rowtabledata['col_6'];

            $dataone = array(
                'date'=> $qty, 
                'qty'=> $qty, 
                'unitprice'=> $unitprice, 
                'total'=> $totalsum, 
                'status'=> '1', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_row_material_idtbl_row_material'=> $materialid,
                'tbl_user_idtbl_user'=> $userID,
                'tbl_grn_idtbl_grn'=> $grnid
            );
            $this->db->insert('tbl_grndetail', $dataone);


            $this->db->set('qty', 'qty + ' . $qty, false); 
            $this->db->set('updatedatetime', $updatedatetime);
            $this->db->where('tbl_row_material_idtbl_row_material', $materialid);
            $this->db->update('tbl_stock');

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

