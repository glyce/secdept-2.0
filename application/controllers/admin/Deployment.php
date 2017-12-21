<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Deployment extends Admin_controller {

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
        $this->load->model('client_model');
    }

    public function index()
    {
        $this->load->model('employee_model');
        $this->load->model('client_sg_request_model');
        $clients = $this->client_model->get_with_user_data();
        
        $requests = $this->client_sg_request_model->get_with_user_data();
        $employee_id_list = array();
        foreach ($requests as $key => $request){
            array_push($employee_id_list, $request['employee_id']);
        }
        $ids = (count($employee_id_list) > 0) ? join("','", $employee_id_list) : array();

        $param = array();
        $param['where'] = array('tbl_employees.employee_type' => 1);

        if (count($ids) > 0) {
            $param['where_not_in'] = "tbl_employees.id NOT IN ('$ids')";
            $available_security_guards = $this->employee_model->get_with_user_data($param);
        } else {
            $available_security_guards = $this->employee_model->get_with_user_data($param);
        }

        $pending   = $this->client_sg_request_model->get_with_data(array(
            'where' => array('tbl_client_sg_requests.request_status' => 0)
        ));
        $approved  = $this->client_sg_request_model->get_with_data(array(
            'where' => array('tbl_client_sg_requests.request_status' => 1)
        ));
        $rejected  = $this->client_sg_request_model->get_with_data(array(
            'where' => array('tbl_client_sg_requests.request_status' => 2)
        ));
        $cancelled = $this->client_sg_request_model->get_with_data(array(
            'where' => array('tbl_client_sg_requests.request_status' => 3)
        ));
        
        foreach ($rejected as $reject) {
            $checker = $this->client_sg_request_model->get_by(array(
                'request_status' => 2,
                'employee_id' => $reject['employee_id']
            ));

            if (isset($checker['id']) || count($checker['id']) > 0) {
                $this->client_sg_request_model->update($checker['id'], array('request_status' => 4));
            }
        }

        $referred_security_guards = array(
            'pending'   => $pending,
            'approved'  => $approved,
            'rejected'  => $rejected,
            'cancelled' => $cancelled
        );

        $this->data = array(
            'page_header'     => 'Deployment',
            'notification'    => array('sound' => FALSE),
            'active_menu'     => $this->active_menu,
            'clients'         => $clients,
            'available_security_guards' => $available_security_guards,
            'referred_security_guards'  => $referred_security_guards
        );
        $this->admin_template('pages/admin/deployment');
    }

    public function submit_selected_guards()
    {
        $posted_data = $this->input->post();
        $client_id = $posted_data['client_id'];
        $employees = (isset($posted_data['employee_ids'])) ? $posted_data['employee_ids'] : null;

        $data   = array();
        $result = array();
        $this->load->model('client_sg_request_model');

        if ($employees === null) {
            $this->session->set_flashdata('error', 'No employee has been selected. Please try again.');
            redirect('admin/deployment');
        }

        $a = 0;

        do {
            $data[$a]['client_id']      = $client_id;
            $data[$a]['employee_id']    = $employees[$a];
            $data[$a]['created']        = date('Y-m-d H:i:s');
            $data[$a]['request_status'] = 0; // Set status to pending

            $result[$a]['result'] = $this->client_sg_request_model->insert($data[$a]);

            $result[$a]['message'] = ($result[$a]['result']) ? 'Success' : 'Failed';

            $a++;

        } while ($a < count($employees));

        dump($result);
        $this->session->set_flashdata('success', 'Successfully submit guard referals');
        redirect('admin/deployment');
    }

    public function cancel_request()
    {
        $request_id = $this->uri->segment(4);
        $this->load->model('client_sg_request_model');
        $updated = $this->client_sg_request_model->update($request_id, array('request_status' => 4));

        $this->session->set_flashdata('success', 'Successfully pull out security guard.');
        redirect('admin/deployment');
    }
}
// End of file Deployment.php
// Location: ./application/controller/Deployment.php