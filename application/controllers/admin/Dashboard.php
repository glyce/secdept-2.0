<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Dashboard extends Admin_controller {

    protected $active_menu = '';

    /**
     * Some description here
     * 
     * @param
     * @return
     */
    function __construct()
    {
        parent::__construct();
        $this->active_menu = $this->uri->segment(2);
        $this->load->model('page_model');
        $this->load->model('employee_model');
    }

    public function index()
    {
        // security guards
        $employees = $this->employee_model->get_with_user_data();

        // security guards
        $param1 = array('where' => array('tbl_employees.employee_type' => 1));
        $security_guards = $this->employee_model->get_with_user_data($param1);

        // inspectors
        $param2 = array('where' => array('tbl_employees.employee_type' => 2));
        $inspectors = $this->employee_model->get_with_user_data($param2);

        // office staffs
        $param3 = array('where' => array('tbl_employees.employee_type' => 3));
        $office_staffs = $this->employee_model->get_with_user_data($param3);

        $this->data = array(
            'page_header'  => 'Dashboard',
            'notification' => array('sound' => FALSE),
            'active_menu'  => $this->active_menu,
            'employees'    => $employees,
            'total_employees'       => count($employees),
            'total_security_guards' => count($security_guards),
            'total_inspectors'      => count($inspectors),
            'total_office_staffs'   => count($office_staffs)
        );

        $this->admin_template('pages/admin/admin-dashboard');
    }
}
// End of file Dashboard.php
// Location: ./application/controller/Dashboard.php