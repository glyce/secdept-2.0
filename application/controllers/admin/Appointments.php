<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Appointments extends Admin_controller {

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
        $this->data = array(
            'page_header' => 'Appointments',
            'notification' => array('sound' => FALSE),
            'active_menu'  => $this->active_menu
        );
        $this->admin_template('pages/admin/appointments');
    }
}
// End of file Appointments.php
// Location: ./application/controller/Appointments.php