<?php
class AdditionalCostInfo extends CI_Model
{
    public function Costinsertupdate()
    {
        $this->db->trans_begin();

        $userID = $_SESSION['userid'];
        $costtype = $this->input->post('costtype');
        $description = $this->input->post('description');
        $recordOption = $this->input->post('recordOption');
        if (!empty($this->input->post('recordID'))) {
            $recordID = $this->input->post('recordID');
        }

        $insertdatetime = date('Y-m-d H:i:s');

        if ($recordOption == 1) {
            $data = array(
                'costtype' => $costtype,
                'description' => $description,
                'status' => '1',
                'insertdatetime' => $insertdatetime,
                'tbl_user_idtbl_user' => $userID,
            );

            $this->db->insert('tbl_additional_cost', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-save';
                $actionObj->title = '';
                $actionObj->message = 'Record Added Successfully';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'success';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            } else {
                $this->db->trans_rollback();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-warning';
                $actionObj->title = '';
                $actionObj->message = 'Record Error';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            }
        } else {
            $data = array(
                'costtype' => $costtype,
                'description' => $description,
                'status' => '1',
                'updatedatetime' => $insertdatetime,
                'tbl_user_idtbl_user' => $userID,
            );

            $this->db->where('idtbl_additional_cost', $recordID);
            $this->db->update('tbl_additional_cost', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-save';
                $actionObj->title = '';
                $actionObj->message = 'Record Updated Successfully';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'primary';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            } else {
                $this->db->trans_rollback();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-warning';
                $actionObj->title = '';
                $actionObj->message = 'Record Error';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            }
        }
    }
//
    public function Coststatus($x, $y)
    {
        $this->db->trans_begin();

        $userID = $_SESSION['userid'];
        $recordID = $x;
        $type = $y;
        $updatedatetime = date('Y-m-d H:i:s');

        if ($type == 1) {
            $data = array(
                'status' => '1',
                'tbl_user_idtbl_user' => $userID,
                'updatedatetime' => $updatedatetime
            );

            $this->db->where('idtbl_additional_cost', $recordID);
            $this->db->update('tbl_additional_cost', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-check';
                $actionObj->title = '';
                $actionObj->message = 'Record Activated Successfully';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'success';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            } else {
                $this->db->trans_rollback();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-warning';
                $actionObj->title = '';
                $actionObj->message = 'Record Error';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            }
        } else if ($type == 2) {
            $data = array(
                'status' => '2',
                'tbl_user_idtbl_user' => $userID,
                'updatedatetime' => $updatedatetime
            );

            $this->db->where('idtbl_additional_cost', $recordID);
            $this->db->update('tbl_additional_cost', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-times';
                $actionObj->title = '';
                $actionObj->message = 'Record Deactivated Successfully';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'warning';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            } else {
                $this->db->trans_rollback();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-warning';
                $actionObj->title = '';
                $actionObj->message = 'Record Error';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            }
        } else if ($type == 3) { // Soft deletion
            $data = array(
                'status' => '3',
                'tbl_user_idtbl_user' => $userID,
                'updatedatetime' => $updatedatetime
            );

            $this->db->where('idtbl_additional_cost', $recordID);
            $this->db->update('tbl_additional_cost', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-trash-alt';
                $actionObj->title = '';
                $actionObj->message = 'Record Removed Successfully';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            } else {
                $this->db->trans_rollback();

                $actionObj = new stdClass();
                $actionObj->icon = 'fas fa-warning';
                $actionObj->title = '';
                $actionObj->message = 'Record Error';
                $actionObj->url = '';
                $actionObj->target = '_blank';
                $actionObj->type = 'danger';

                $actionJSON = json_encode($actionObj);
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('AdditionalCost');
            }
        }
    }

    public function Costedit()
    {
        $recordID = $this->input->post('recordID');

        $this->db->select('*');
        $this->db->from('tbl_additional_cost');
        $this->db->where('idtbl_additional_cost', $recordID);
        $this->db->where('status', 1);

        $respond = $this->db->get();

        $obj = new stdClass();
        $obj->id = $respond->row(0)->idtbl_additional_cost;
        $obj->costtype = $respond->row(0)->costtype;
        $obj->description = $respond->row(0)->description;
        echo json_encode($obj);
    }

    public function Getcostlist()
    {
        $this->db->select('idtbl_additional_cost, costtype, description, status');
        $this->db->from('tbl_additional_cost');
        $this->db->where('status !=', 3);

        return $this->db->get();
    }

    public function get_index_data()
    {
        $this->load->model('Commeninfo');

        $menuaccess = $this->Commeninfo->Getmenuprivilege();

        $data['menuaccess'] = $menuaccess;

        $data['addcheck'] = 1;
        $data['editcheck'] = 1;
        $data['statuscheck'] = 1;
        $data['deletecheck'] = 1;

        if (is_array($menuaccess) || is_object($menuaccess)) {
            foreach ($menuaccess as $privilege) {
                if (isset($privilege->module) && $privilege->module == 'additional_cost') {
                    $data['addcheck'] = isset($privilege->add) ? $privilege->add : 1;
                    $data['editcheck'] = isset($privilege->edit) ? $privilege->edit : 1;
                    $data['statuscheck'] = isset($privilege->status) ? $privilege->status : 1;
                    $data['deletecheck'] = isset($privilege->delete) ? $privilege->delete : 1;
                    break;
                }
            }
        }

        return $data;
    }


    public function get_cost_list()
    {
        $requestData = $this->input->post();

        $columns = array(
            0 => 'idtbl_additional_cost',
            1 => 'costtype',
            2 => 'description',
        );

        $sql = "SELECT idtbl_additional_cost, costtype, description, status 
                FROM tbl_additional_cost 
                WHERE status != 3";

        $query = $this->db->query($sql);
        $totalData = $query->num_rows();
        $totalFiltered = $totalData;

        if (!empty($requestData['search']['value'])) {
            $search = $this->db->escape_like_str($requestData['search']['value']);
            $sql .= " AND (costtype LIKE '%" . $search . "%' 
                     OR description LIKE '%" . $search . "%')";
        }

        $query = $this->db->query($sql);
        $totalFiltered = $query->num_rows();

        $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " .
            intval($requestData['start']) . "," . intval($requestData['length']);

        $query = $this->db->query($sql);
        $data = array();

        foreach ($query->result_array() as $row) {
            $nestedData = array();
            $nestedData[] = $row["idtbl_additional_cost"];
            $nestedData[] = $row["costtype"];
            $nestedData[] = $row["description"];
            $nestedData[] = $row["status"];
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        return $json_data;
    }
    public function get_cost_types()
    {
        $this->db->select('idtbl_additional_cost, costtype');
        $this->db->from('tbl_additional_cost');
        $this->db->where('status', 1); 
        $query = $this->db->get();

        $result = $query->result(); 
        return $result;
    }
    public function save_additional_costs($data, $jobQuotationId)
    {
        $this->db->trans_begin();

        $userID = $_SESSION['userid'];
        $insertdatetime = date('Y-m-d H:i:s');

        $batch_data = [];
        foreach ($data as $item) {
            $batch_data[] = [
                'job_quotation_id' => $jobQuotationId,
                'quotation_item' => $item['quotationItem'],
                'additional_price' => $item['additionalPrice'],
                'cost_type' => $item['costType'],
                'remarks' => $item['remarks'],
                'insertdatetime' => $insertdatetime,
                'tbl_user_idtbl_user' => $userID 
            ];
        }

        $this->db->insert_batch('tbl_added_additional_costs', $batch_data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }

    public function get_additional_costs_by_quotation($jobQuotationId)
    {
        $this->db->select('*');
        $this->db->from('tbl_added_additional_costs');
        $this->db->where('job_quotation_id', $jobQuotationId);
        $this->db->where('status !=', 'deleted');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_additional_cost_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_added_additional_costs');

        return $query->result();
    }


    public function update_additional_cost($data)
    {
        $this->db->trans_begin();

        $userID = $_SESSION['userid'];
        $updatedatetime = date('Y-m-d H:i:s');

        $update_data = array(
            'quotation_item' => $data['quotationItem'],
            'additional_price' => $data['additionalPrice'],
            'cost_type' => $data['costType'],
            'remarks' => $data['remarks'],
            'updatedatetime' => $updatedatetime,
            'tbl_user_idtbl_user' => $userID 
        );

        $this->db->where('id', $data['id']);
        $this->db->update('tbl_added_additional_costs', $update_data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            return TRUE;
        } else {
            $this->db->trans_rollback();
            return FALSE;
        }
    }

    public function delete_additional_cost($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_added_additional_costs', ['status' => 'deleted']);
    }

}