<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Admin_controller extends MY_Controller {
 
    /**
     * Some description here
     * 
     * @param
     * @return
     */
    function __construct()
    {
        parent::__construct();

        if ( ! $this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

        $this->load->model('user_group_model');
        $user_id = $this->ion_auth->user()->row()->user_id;
        $default_group = $this->user_group_model->get_by(array('tbl_user_id' => $user_id, 'default_status' => 1));

        if ($default_group['tbl_group_id'] == 5) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('home', 'refresh');
        }
    }
}
// End of file Admin_controller.php
// Location: ./application/controller/Admin_controller.php