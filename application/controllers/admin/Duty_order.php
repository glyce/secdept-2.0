<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Duty_order extends Admin_controller {

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
        $list_inspectors = $this->employee_model->get_with_user_data($param);
        
        $this->data = array(
            'page_header' => 'Duty Order',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'list_inspectors' => $list_inspectors
        );
        $this->admin_template('pages/admin/duty-order');
    }

    public function selected_inspector()
    {
        $post = $this->input->post();

        // NOTE: Eto current select na inspector
        $employee_id = $post['employee_id'];

        if (empty($employee_id)) {
            redirect('admin/duty_order');
        }

        $this->load->model('employee_model');
        
        $param1 = array();
        $param1['where'] = array('tbl_employees.id' => $employee_id);
        $selected_inspector = $this->employee_model->get_with_user_data($param1);

        $param2 = array();
        $param2['where'] = array('tbl_employees.employee_type' => 2);
        $list_inspectors = $this->employee_model->get_with_user_data($param2);

        $this->data = array(
            'page_header' => 'Duty Order',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'list_inspectors' => $list_inspectors,
            'selected_inspector' => $selected_inspector[0],
            'employee_id' => $employee_id
        );
        $this->admin_template('pages/admin/duty-order');
    }
}
// End of file Duty_order.php
// Location: ./application/controller/Duty_detail_order.php