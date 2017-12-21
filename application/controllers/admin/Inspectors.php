<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Inspectors extends Admin_controller {

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
        
        $param = array();
        $param['where'] = array('tbl_employees.employee_type' => 2);
        $inspectors = $this->employee_model->get_with_user_data($param);
        
        // dump($this->db->last_query());
        // dump($inspectors);  
        // exit;
        
        $this->data = array(
            'page_header' => 'Inspectors',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'inspectors' => $inspectors
        );
        $this->admin_template('pages/admin/inspectors');
    }
}
// End of file Inspectors.php
// Location: ./application/controller/Inspectors.php