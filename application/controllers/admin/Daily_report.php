<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Daily_report extends Admin_controller {

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
        $this->load->model('daily_time_activity_model');
        
        $daily_activities = $this->daily_time_activity_model->get_employee_data();

        $this->data = array(
            'page_header' => 'Daily Report',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'daily_activities' => $daily_activities
        );
        $this->admin_template('pages/admin/daily-report');
    }

    public function approved()
    {
        $daily_report_id = $this->uri->segment(4);
        $this->load->model('daily_time_activity_model');
        $updated = $this->daily_time_activity_model->update($daily_report_id, array('status' => 1));

        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('admin/daily_report');
    }

    public function declined()
    {
        $daily_report_id = $this->uri->segment(4);
        $this->load->model('daily_time_activity_model');
        $updated = $this->daily_time_activity_model->update($daily_report_id, array('status' => 2));

        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('admin/daily_report');
    }
    public function add_report()
    {
        $this->data = array(
            'page_header'  => 'Security Guard Report',
            'notification' => array("sounds" =>false),
            'active_menu' => $this->active_menu
        );
        $this->admin_template('forms/add-report');
    
    }
}
// End of file Daily_report.php
// Location: ./application/controller/Daily_report.php