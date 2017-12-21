<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @author
 */
class Client_sg_request_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $_table = 'tbl_client_sg_requests';
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $primary_key = 'id';
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $return_type = 'array';


    protected $after_get = array('after_get_prep_data');

    protected function after_get_prep_data($client)
    {

        if ( ! isset($client)) return FALSE;

        $employee_fullname = array(
            (isset($client['employee_last_name'])) ? $client['employee_last_name'].', ':'',
            (isset($client['employee_first_name'])) ? $client['employee_first_name'].' ':'',
            (isset($client['employee_middle_name'])) ? substr($client['employee_middle_name'], 1) : ''
        );
        $client['employee_fullname'] = strtoupper(implode('', $employee_fullname));

        $client_fullname = array(
            (isset($client['client_last_name'])) ? $client['client_last_name'].', ':'',
            (isset($client['client_first_name'])) ? $client['client_first_name'].' ':'',
            (isset($client['client_middle_name'])) ? substr($client['client_middle_name'], 1) : ''
        );
        $client['client_fullname'] = strtoupper(implode('', $client_fullname));

        switch ($client['request_status']) {
            case '0':
                $client['request_status_label'] = '<span class="label label-warning">Pending</span>';	
            break;
            case '1':
                $client['request_status_label'] = '<span class="label label-success">Approved</span>';	
            break;
            case '2':
                $client['request_status_label'] = '<span class="label label-danger">Rejected</span>';	
            break;
            case '3':
                $client['request_status_label'] = '<span class="label label-danger">Cancelled</span>';	
            break;
            default:
                $client['request_status_label'] = '<span class="label label-warning">Pending</span>';
            break;
        }

        return $client;
    }

    /**
     * Some description here
     * 
     * @author
     */
    public function get_with_user_data($single = FALSE)
    {
        $this->db->select('
            tbl_client_sg_requests.id as request_id,
            tbl_client_sg_requests.request_status,
            ue.first_name as employee_first_name, ue.middle_name as employee_middle_name,
            ue.last_name as employee_last_name, ue.email as employee_email,
            ue.phone as employee_phone, ue.active as employee_user_status,
            uc.first_name as client_first_name, uc.middle_name as client_middle_name,
            uc.last_name as client_last_name, uc.email as client_email,
            uc.phone as client_phone, uc.active as client_user_status,
            eg.license_number, e.date_hired, e.id as employee_id
        ');
        $this->db->join('tbl_clients as c', 'tbl_client_sg_requests.client_id = c.id', 'left');
        $this->db->join('tbl_users as uc', 'c.user_id = uc.id', 'left');
        $this->db->join('tbl_employees as e', 'tbl_client_sg_requests.employee_id = e.id', 'left');
        $this->db->join('tbl_users as ue', 'e.user_id = ue.id', 'left');
        $this->db->join('tbl_employee_types as et', 'e.employee_type = et.id', 'left');
        $this->db->join('tbl_employee_government_id_numbers as eg', 'e.id = eg.employee_id', 'left');
        $this->db->where('tbl_client_sg_requests.request_status', 0);
        $this->db->or_where('tbl_client_sg_requests.request_status', 1);

        $fn = $single == FALSE ? 'get_many_by' : 'get_by';
        
        if ( ! empty($where)) {
            return $this->{$fn}($where);
        } else {
            return $this->get_all();
        }
    }

    public function get_with_data($param = '', $single = FALSE)
    {
        $this->db->select('
            tbl_client_sg_requests.id as request_id,
            tbl_client_sg_requests.request_status,
            ue.first_name as employee_first_name, ue.middle_name as employee_middle_name,
            ue.last_name as employee_last_name, ue.email as employee_email,
            ue.phone as employee_phone, ue.active as employee_user_status,
            uc.first_name as client_first_name, uc.middle_name as client_middle_name,
            uc.last_name as client_last_name, uc.email as client_email,
            uc.phone as client_phone, uc.active as client_user_status,
            eg.license_number, e.date_hired, e.id as employee_id,
            c.id as client_id
        ');
        $this->db->join('tbl_clients as c', 'tbl_client_sg_requests.client_id = c.id', 'left');
        $this->db->join('tbl_users as uc', 'c.user_id = uc.id', 'left');
        $this->db->join('tbl_employees as e', 'tbl_client_sg_requests.employee_id = e.id', 'left');
        $this->db->join('tbl_users as ue', 'e.user_id = ue.id', 'left');
        $this->db->join('tbl_employee_types as et', 'e.employee_type = et.id', 'left');
        $this->db->join('tbl_employee_government_id_numbers as eg', 'e.id = eg.employee_id', 'left');

        $fn = $single == FALSE ? 'get_many_by' : 'get_by';
        
        if ( ! empty($param['where'])) {
            $where = $param['where'];
            return $this->{$fn}($where);
        } else {
            return $this->get_all();
        }
    }
 
}
// End of file Client_model.php
// Location: ./application/model/Client_model.php