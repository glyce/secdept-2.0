<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Incident_report extends Admin_controller {

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
        $this->load->model('incident_report_model');

        $incident_reports = $this->incident_report_model->get_all();

        $this->data = array(
            'page_header'      => 'Incident Report',
            'notification'     => array('sound' => FALSE),
            'active_menu'      => $this->active_menu,
            'incident_reports' => $incident_reports
        );
        $this->admin_template('pages/admin/incident-report');
    }

    public function approved()
    {
        $this->load->model('incident_report_model');
        
        $incident_report_id = $this->uri->segment(4);
        $updated = $this->incident_report_model->update($incident_report_id, array('status' => 1));

        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('admin/incident_report');
    }

    public function declined()
    {
        $this->load->model('incident_report_model');
        
        $incident_report_id = $this->uri->segment(4);
        $updated = $this->incident_report_model->update($incident_report_id, array('status' => 2));

        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('admin/incident_report');
    }
}
// End of file Incident_report.php
// Location: ./application/controller/Incident_report.php