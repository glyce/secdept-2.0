<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Portal extends Frontend_controller {
    
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
    }

    public function register()
    {
        $this->data['page_header'] = 'REGISTER';

        $this->load->model('city_model');
        $this->load->model('client_model');

        $posted_data = $this->input->post();

    	$this->form_validation->set_rules('register_first_name', 'FIRST NAME', 'trim|required|alpha');
    	$this->form_validation->set_rules('register_middle_name', 'MIDDLE NAME', 'trim|alpha');
    	$this->form_validation->set_rules('register_last_name', 'LAST NAME', 'trim|required|alpha');
        $this->form_validation->set_rules('register_company_name', 'COMPANY NAME', 'trim|required');
    	$this->form_validation->set_rules('register_company_address', 'COMPANY ADDRESS', 'trim|required');
    	$this->form_validation->set_rules('register_company_contact_number', 'CONTACT NUMBER', 'trim|required|numeric|min_length[11]|max_length[11]');
    	$this->form_validation->set_rules('register_city_id', 'CITY', 'trim|required');
    	
    	$this->form_validation->set_rules('register_email', 'EMAIL ADDRESS', 'trim|required|valid_email|is_unique[tbl_users.email]');
    	$this->form_validation->set_rules('register_username', 'USERNAME', 'trim|required|is_unique[tbl_users.username]');
    	$this->form_validation->set_rules('register_password', 'PASSWORD', 'trim|required|alpha_dash|min_length[10]');
    	$this->form_validation->set_rules('retype_password', 'RETYPE PASSWORD', 'trim|required|matches[register_password]');
    	$this->form_validation->set_rules('accept_terms', '...', 'trim|required|callback_accept_terms');

    	if ($this->form_validation->run() == TRUE) {
            // this we're gonna store system messages
            $message = array();

            $explode_fname   = explode(' ', $posted_data['register_first_name']);
            $implode_fname   = implode('', $explode_fname);
            $username        = $posted_data['register_username'];
            $password        = $posted_data['register_password'];
            $email           = strtolower($posted_data['register_email']);
            $additional_data = array(
                'first_name'  => strtoupper($posted_data['register_first_name']),
                'last_name'   => strtoupper($posted_data['register_last_name']),
                'middle_name' => strtoupper($posted_data['register_middle_name']),
                'profile_picture' => 'assets/img/profile_pics/PLACEHOLDER.png'
            );
            $group = array('5'); // Sets user role to Client
            // get last user id 

            $file_name = $_FILES['register_dti_form']['name'];

            // get file extention
            $file_basename = substr($file_name, 0, strripos($file_name, '.'));

            // get file name
            $file_ext = substr($file_name, strripos($file_name, '.'));
            
            $file_size = $_FILES['register_dti_form']['size'];

            $allowed_file_types = array('.jpg', '.jpeg', '.png', '.gif', '.pdf');

            if (in_array($file_ext, $allowed_file_types) && ($file_size < 200000))
            {
                // Rename file
                $new_file_name = date('YmdHi-').md5($file_basename) . $file_ext;

                if (file_exists('assets/uploads/dti/' . $new_file_name))
                {
                    $this->session->set_flashdata('upload_dti', 'You have already uploaded this file.');
                }
                else
                {
                    $file_data = array(
                        'dti_form_filename' => $new_file_name,
                        'dti_form_filepath' => 'assets/uploads/dti/' . $new_file_name
                    );
                    
                    // $registered = $active_records->insert_new_client($_POST, $file_data);
                    move_uploaded_file($_FILES['register_dti_form']['tmp_name'], $file_data['dti_form_filepath']);

                }
            }
            elseif (empty($file_basename))
            {
                $this->session->set_flashdata('upload_dti', 'Please select a file to upload.');
            }
            elseif ($file_size > 200000)
            {
                // file size error
                $this->session->set_flashdata('upload_dti', 'The file you are trying to upload is too large.');
            }
            else
            {
                // file type error
                $this->session->set_flashdata('upload_dti', "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types));
                unlink($_FILES["file"]["tmp_name"]);
            }

            $user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            $this->db->set(array('default_status' => 1))->where('tbl_user_id', $user_id)->update('tbl_users_groups');
            
            // TODO: check if user_id is not empty
            $message[] = empty($user_id) ? 'NO USER DATA HAS BEEN CREATED.' : 'SUCCESSFULLY CREATED USER DATA.';

            $client_data = array(
                'user_id' => $user_id,
                'city_id' => $posted_data['register_city_id'],
                'address' => $posted_data['register_company_address'],
                'dti_form_filename' => $file_data['dti_form_filename'],
                'dti_form_filepath' => $file_data['dti_form_filepath'],
                'company_name' => $posted_data['register_company_name'],
                'created' => date('Y-m-d H:i:s'),
                'status'  => 1
            );

            $client_id = $this->client_model->insert($client_data);

            if ( ! $client_id) {
                $this->session->set_flashdata('error', 'Unable to register. Please try again');
                redirect('/home');
            }

            $this->session->set_flashdata('success', implode(' ', $message));
            redirect('/home');
        }

        $this->session->set_flashdata('error_array', $this->form_validation->error_array());

		$this->data['cities'] = $this->city_model->get_city_with_province();
        $this->frontend_template('pages/register');
    }

    function accept_terms() {
		if (isset($_POST['accept_terms'])) return true;
		$this->form_validation->set_message('accept_terms', 'Please read and accept our terms and conditions.');
		return false;
    }
    
    public function profile($user_id = '')
    {
        $this->load->model('employee_model');
        $this->load->model('client_model');
        if ($user_id === '') {
            $this->session->set_flashdata('error', 'Please select user.');
            redirect('/home');
        }

        $user = $this->ion_auth->user($user_id)->row();

        $client = $this->client_model->get_by(array('user_id' => $user_id));

        $this->load->model('client_sg_request_model');

        // list of client pending request
        $param_pending = array(
            'where' => array(
                'tbl_client_sg_requests.request_status' => 0,
                'tbl_client_sg_requests.client_id' => $client['id']
            )
        );
        $pending = $this->client_sg_request_model->get_with_data($param_pending);
       
        
        // list of client approved request
        $param_approved = array(
            'where' => array(
                'tbl_client_sg_requests.request_status' => 1,
                'tbl_client_sg_requests.client_id' => $client['id']
            )
        );
        $approved = $this->client_sg_request_model->get_with_data($param_approved);
       
        
        // list of client rejected request
        $param_rejected = array(
            'where' => array(
                'tbl_client_sg_requests.request_status' => 2,
                'tbl_client_sg_requests.client_id' => $client['id']
            )
        );
        $rejected = $this->client_sg_request_model->get_with_data($param_rejected);
       
        
        // list of client cancelled request
        $param_cancelled = array(
            'where' => array(
                'tbl_client_sg_requests.request_status' => 3,
                'tbl_client_sg_requests.client_id' => $client['id']
            )
        );
        $cancelled = $this->client_sg_request_model->get_with_data($param_cancelled);

        $total_refered_guard1 = $this->client_sg_request_model->get_with_data(array('tbl_client_sg_requests.client_id' => $client['id']));
        $total_refered_guard2 = count($total_refered_guard1);

        $referred_security_guards = array(
            'pending'   => $pending,
            'approved'  => $approved,
            'rejected'  => $rejected,
            'cancelled' => $cancelled
        );
        $this->load->model('security_guard_request_approved_model');
        $approved_schedule = $this->security_guard_request_approved_model->get_all();
        $this->data['page_header']     = 'Deployment';
        $this->data['referred_guards'] = $referred_security_guards;
        $this->data['active_menu']     = $this->active_menu;
        $this->data['user_data']       = $this->ion_auth->user()->row();
        $this->data['notification']    = array('sound' => FALSE);
        $this->data['total_refered_guards'] = $total_refered_guard2;
        $this->data['approved_schedule'] = $approved_schedule;
        
        $this->frontend_template('pages/profile');
    }


    public function reject_referal($request_id, $user_id)
    {
        $this->load->model('client_sg_request_model');
        $this->load->model('security_guard_request_rejected');
        $updated = $this->client_sg_request_model->update($request_id, array('request_status' => 2));
        $request_data = $this->client_sg_request_model->get_by(array('id' => $request_id));

        if ($updated) {
            $posted_data = $this->input->post();

            $temp_data = array(
                'request_id'  => $request_id,
                'client_id'   => $request_data['client_id'],
                'employee_id' => $request_data['employee_id'],
                'remarks'     => $posted_data['remarks'],
                'created'     => date('Y-m-d H:i:s'),
                'created_by'  => $this->ion_auth->user()->row()->id,
            );

            $this->security_guard_request_rejected->insert($temp_data);
            
            $this->session->set_flashdata('success', 'Successfully updated the request.');
            redirect('/portal/profile/'.$user_id);
        }
    }

    public function approve_referal($request_id, $user_id)
    {
        $this->load->model('client_sg_request_model');
        $this->load->model('security_guard_request_approved_model');

        $updated = $this->client_sg_request_model->update($request_id, array('request_status' => 1));
        $message = array();

        $request_data = $this->client_sg_request_model->get($request_id);
            
        $temp_data = array(
            'client_id'      => $request_data['client_id'],
            'employee_id'    => $request_data['employee_id'],
            'request_id'     => $request_data['id'],
            'created'        => date('Y-m-d H:i:s'),
            'created_by'     => $this->ion_auth->user()->row()->id
        );

        // create employee dployment details
        $result = $this->security_guard_request_approved_model->insert($temp_data);

        $message[] = $result ? 'SUCCESSFULLY CREATED INITIAL SCHEDULE OF SECURITY GUARD. KINDLY UPDATED THE SCHEDULE.' : '';
        $this->session->set_flashdata('success', implode(' ', $message));
        redirect('portal/profile/'.$user_id);
    }

    public function update_security_guard_schedule()
    {
        $request_id = $this->uri->segment(3);

        $this->load->model('client_sg_request_model');
        $this->load->model('security_guard_request_approved_model');

        $posted_data = $this->input->post();

        $requested_data = $this->client_sg_request_model->get($request_id);

        // checker if initial schedule is set then insert new record
        $have_initial_schedule = $this->security_guard_request_approved_model->get_by(array('request_id' => $request_id));

        if (count($have_initial_schedule) <= 0) {
            dump('insert');
            $user_id = $this->ion_auth->user()->row()->id;
            $temp_data_array = array(
                'request_id'     => $request_id,
                'client_id'      => $requested_data['client_id'],
                'employee_id'    => $requested_data['employee_id'],
                'shift_schedule' => $posted_data['shift_schedule'],
                'time_start'     => date('H:i', strtotime($posted_data['time_start'])),
                'time_end'       => date('H:i', strtotime($posted_data['time_end'])),
                'over_time'      => $posted_data['over_time'],
                'day_off'        => $posted_data['day_off'],
                'created'        => date('Y-m-d H:i:s'),
                'created_by'     => $user_id
            );

            $inserted = $this->security_guard_request_approved_model->insert($temp_data_array);
            $this->session->set_flashdata('success', 'Successfully added security guard daily schedule');
            redirect('portal/profile/' . $user_id);
        } else {
            dump('update');

            $user_id = $this->ion_auth->user()->row()->id;

            $temp_data_array = array(
                'shift_schedule' => $posted_data['shift_schedule'],
                'time_start'     => date('H:i', strtotime($posted_data['time_start'])),
                'time_end'       => date('H:i', strtotime($posted_data['time_end'])),
                'over_time'      => $posted_data['over_time'],
                'day_off'        => $posted_data['day_off'],
            );

            $updated = $this->security_guard_request_approved_model->update_by(array('request_id' => $request_id), $temp_data_array);

            $this->session->set_flashdata('success', 'Successfully updated security guard daily schedule');
            redirect('portal/profile/' . $user_id);
        }

    }

    public function send_daily_time_activity()
    {
        $posted_data = $this->input->post();

        $this->load->model('daily_time_activity_model');

        $temp_array = array(
            'client_id'   => $posted_data['client_id'],
            'employee_id' => $posted_data['employee_id'],
            'title'       => $posted_data['title'],
            'body'        => $posted_data['body'],
            'created'     => date('Y-m-d H:i:s'),
            'created_by'  => $this->ion_auth->user()->row()->id,
            'status'      => 0
        );

        $inserted = $this->daily_time_activity_model->insert($temp_array);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Successfully created daily activity record.');
            redirect('portal/profile/' . $this->ion_auth->user()->row()->id);
        } else {
            $this->session->set_flashdata('error', 'Unable to create daily activity record.');
            redirect('portal/profile/' . $this->ion_auth->user()->row()->id);
        }

    }

    public function send_incident_report()
    {
        $posted_data = $this->input->post();

        $this->load->model('incident_report_model');

        $temp_array = array(
            'client_id'   => $posted_data['incident_client_id'],
            'employee_id' => $posted_data['incident_employee_id'],
            'title'       => $posted_data['inicident_title'],
            'body'        => $posted_data['inicident_body'],
            'created'     => date('Y-m-d H:i:s'),
            'created_by'  => $this->ion_auth->user()->row()->id,
            'status'      => 0
        );

        $inserted = $this->incident_report_model->insert($temp_array);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Successfully created incident report record.');
            redirect('portal/profile/' . $this->ion_auth->user()->row()->id);
        } else {
            $this->session->set_flashdata('error', 'Unable to create incident report record.');
            redirect('portal/profile/' . $this->ion_auth->user()->row()->id);
        }

    }
}
// End of file Portal.php
// Location: ./application/controller/Portal.php