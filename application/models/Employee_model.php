<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @authord
 */
class Employee_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @authord
     */
    protected $_table = 'tbl_employees';
 
    /**
     * Some description here
     * 
     * @authord
     */
    protected $primary_key = 'id';
 






    /**
     * Some description here
     * 
     * @authord
     */
    protected $return_type = 'array';

    /**
     * Some description here
     * 
     * @authord
     */
    protected $after_get = array('after_get_prep_data');
    
    /**
     * Some description here
     * 
     * @authord
     */
    protected function after_get_prep_data($employee)
    {
        if ( ! isset($employee)) return FALSE;
        $fullname = array($employee['last_name'].', ', $employee['first_name'].' ', $employee['middle_name']);
        $employee['employee_fullname'] = ucwords(strtolower(implode('', $fullname)));

        $employee['first_name'] = ucfirst(strtolower($employee['first_name']));
        $employee['middle_name'] = ucfirst(strtolower($employee['middle_name']));
        $employee['last_name'] = ucfirst(strtolower($employee['last_name']));
        $employee['date_hired'] = ucfirst(strtolower($employee['date_hired']));
        $employee['name'] = ucwords(strtolower($employee['name']));

        $employee['gender_label'] = $employee['gender'] == 1 ? 'Male' : 'Female';
        $employee['status_label'] = $employee['active'] == 1 ? '<label class="label label-success">ACTIVE</label>' : '<label class="label label-danger">INACTIVE</label>';

        return $employee;
    }

    /**
     * Some description here
     * 
     * @authord
     */
    public function get_with_user_data($param = '', $single = FALSE)
    {
        if ( ! empty($param)) {
            if (isset($param['where_not_in'])) {
                $this->db->where($param['where_not_in']);
            }
            
            if (isset($param['where'])) {
                $this->db->where($param['where']);
            }
        }

        $this->db->select('
            tbl_employees.*, u.first_name,
            u.middle_name, u.last_name, u.email,
            u.phone, u.active, u.profile_picture,
            eg.license_number, eg.tin,
            ei.birth_date, ei.birth_place, 
            eg.sss, eg.hdmf, eg.phic,
            eg.licensed_number_expiration,
           
            et.name,
            ei.*,
            cs.name as civil_status_name
        ');
        // $this->db->from('tbl_employees');
        $this->db->join('tbl_users as u', 'tbl_employees.user_id = u.id', 'left');
        $this->db->join('tbl_employee_personal_information as ei', 'tbl_employees.id = ei.employee_id', 'left');
        $this->db->join('tbl_employee_government_id_numbers as eg', 'tbl_employees.id = eg.employee_id', 'left');
        // $this->db->join('tbl_employee_educational_background as ee', 'tbl_employees.id = ee.employee_id', 'left');
        $this->db->join('tbl_employee_types as et', 'tbl_employees.employee_type = et.id', 'left');
        $this->db->join('tbl_civil_status as cs', 'ei.civil_status = cs.id', 'left');
        return $this->get_all();
    }
 
}
// End of file Employee_model.php
// Location: ./application/model/Employee_model.php