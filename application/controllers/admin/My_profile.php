<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class My_profile extends Admin_controller {

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
        $user_id = $this->ion_auth->user()->row()->id;
        $param['where'] = array('u.id' => $user_id);
        $employee = $this->employee_model->get_with_user_data($param, TRUE);
        
        $this->data = array(
            'page_header' => 'My Profile',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'employee' => $employee[0]
        );
        $this->admin_template('pages/admin/my-profile');
    }
}
// End of file My_profile.php
// Location: ./application/controller/My_profile.php