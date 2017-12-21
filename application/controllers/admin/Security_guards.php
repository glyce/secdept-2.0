<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Security_guards extends Admin_controller {

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
    }

    public function index()
    {
        $this->load->model('employee_model');
        $security_guards = $this->employee_model->get_with_user_data(array('tbl_employees.employee_type' => 1));
        // dump($this->db->last_query());
        // exit;
        $this->data = array(
            'page_header' => 'Security Guards',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'security_guards' => $security_guards
        );
        $this->admin_template('pages/admin/security-guards');
    }
}
// End of file Security_guards.php
// Location: ./application/controller/Security_guards.php