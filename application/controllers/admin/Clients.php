<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Clients extends Admin_controller {

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
        $clients = $this->client_model->get_with_user_data();
        $this->data = array(
            'page_header' => 'Clients',
            'notification' => array('sound' => FALSE),
            'active_menu' => $this->active_menu,
            'clients' => $clients
        );
        $this->admin_template('pages/admin/clients');
    }

    public function approve($user_id)
    {
        $user_data = $this->ion_auth->user($user_id)->row();
        // dump($user_data);
        redirect('admin/clients/activate/'.$user_id.'/'.$user_data->activation_code);
    }

    public function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("admin/clients", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
    }
    
    public function deactivate($user_id)
    {
        $this->ion_auth->deactivate($user_id);

        $this->session->set_flashdata('success', $this->ion_auth->messages());
        $this->session->set_flashdata('error', $this->ion_auth->errors());

        redirect('admin/clients/');
        
    }

}
// End of file Clients.php
// Location: ./application/controller/Clients.php