<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Employees extends Admin_controller {

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
        $this->load->model('employee_model');
    }

    public function index()
    {
        $employees = $this->employee_model->get_with_user_data();
            
        $this->data = array(
            'page_header'  => 'Employees',
            'notification' => array('sound' => FALSE),
            'active_menu'  => $this->active_menu,
            'employees'    => $employees
        );
        $this->admin_template('pages/admin/employees');
    }

    public function add_new()
    {
        $this->load->model('educational_attainment_model');
        $this->load->model('employee_type_model');
        $educational_attainments = $this->educational_attainment_model->get_all();
        $employee_types = $this->employee_type_model->get_all();

        //validate data
        $this->form_validation->set_rules('guard_hired_date', 'DATE HIRED', 'trim|required');
        $this->form_validation->set_rules('guard_employee_type', 'EMPLOYEE TYPE', 'trim|required');
        $this->form_validation->set_rules('guard_first_name', 'FIRST NAME', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('guard_middle_name', 'MIDDLE NAME', 'trim|alpha');
        $this->form_validation->set_rules('guard_last_name', 'LAST NAME', 'trim|required|alpha');
        $this->form_validation->set_rules('guard_contact_number', 'CONTACT NUMBER', 'trim|required|numeric|max_length[11]|min_length[11]');
        $this->form_validation->set_rules('guard_email', 'EMAIL ADDRESS', 'trim|required|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('guard_gender', 'GENDER', 'trim');
        $this->form_validation->set_rules('guard_civil_status', 'CIVIL STATUS', 'trim');
        $this->form_validation->set_rules('guard_birthdate', 'BIRTH DATE', 'trim');
        $this->form_validation->set_rules('guard_birthplace', 'BIRTH PLACE', 'trim');
        $this->form_validation->set_rules('guard_current_address', 'CURRENT ADDRESS', 'trim');
        $this->form_validation->set_rules('guard_citizenship', 'CITIZENSHIP', 'trim');
        $this->form_validation->set_rules('guard_religion', 'RELIGION', 'trim');
        $this->form_validation->set_rules('guard_height', 'HEIGHT', 'trim|numeric');
        $this->form_validation->set_rules('guard_weight', 'WEIGHT', 'trim|numeric');
        $this->form_validation->set_rules('guard_eye_color', 'EYE COLOR', 'trim|alpha');
        $this->form_validation->set_rules('guard_hair_color', 'HAIR COLOR', 'trim|alpha');
        $this->form_validation->set_rules('guard_licensed', 'LICENSED', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('guard_ln_expiration', 'LICENSED EXPIRATION', 'trim|required');
        $this->form_validation->set_rules('guard_sss', 'SSS', 'trim|required');
        $this->form_validation->set_rules('guard_tin', 'TIN', 'trim|required');
        $this->form_validation->set_rules('guard_hdmf', 'HDMF', 'trim|required');
        $this->form_validation->set_rules('guard_phic', 'PHIC', 'trim|required');
        // $this->form_validation->set_rules('nbi', 'NBI', 'trim|required');
        // $this->form_validation->set_rules('nbi_file', 'NBI FILE', 'trim|required');
        // $this->form_validation->set_rules('medical', 'MEDICAL', 'trim|required');
        // $this->form_validation->set_rules('medical_file', 'MEDICAL FILE', 'trim|required');
        // $this->form_validation->set_rules('police_clearance', 'POLICE CLEARANCE', 'trim|required');
        // $this->form_validation->set_rules('pc_file', 'PC FILE', 'trim|required');
        // $this->form_validation->set_rules('barangay_clearance', 'BARANGAY CLEARANCE', 'trim|required');
        // $this->form_validation->set_rules('bc_file', 'BC FILE', 'trim|required');
        // $this->form_validation->set_rules('neuro', 'NEURO CERTIFICATE', 'trim|required');
        // $this->form_validation->set_rules('neuro_file', 'NC FILE', 'trim|required');

        
        
        // save to users table
        if ($this->form_validation->run() == TRUE) {
            $this->save_data();
        }

        $this->data = array(
            'page_header'  => 'Add Employees',
            'notification' => array('sound' => FALSE),
            'active_menu'  => $this->active_menu,
            'educational_attainments' => $educational_attainments,
            'employee_types' => $employee_types
        );
        $this->admin_template('forms/add-employee');
    }

    public function save_data()
    {
        $posted_data = $this->input->post();

        // this we're gonna store system messages
        $message = array();

        

        $explode_fname   = explode(' ', $posted_data['guard_first_name']);
        $implode_fname   = implode('', $explode_fname);
        $username        = strtolower($posted_data['guard_last_name'].'.'.$implode_fname);
		$password        = strtolower($posted_data['guard_last_name'].'.'.$implode_fname);
		$email           = strtolower($posted_data['guard_email']);
		$additional_data = array(
            'first_name'  => strtoupper($posted_data['guard_first_name']),
            'last_name'   => strtoupper($posted_data['guard_last_name']),
            'middle_name' => strtoupper($posted_data['guard_middle_name']),
            'profile_picture' => 'assets/img/profile_pics/PLACEHOLDER.png'
        );
        

        if ($posted_data['guard_employee_type'] == 1) {
            $group = array('4'); // Sets user role to security guard.
        }

        if ($posted_data['guard_employee_type'] == 2) {
            $group = array('3'); // Sets user role to inspector.
        }

        if ($posted_data['guard_employee_type'] == 3) {
            $group = array('1'); // Sets user role to admin.
        }

        // get last user id 
        $user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
        $this->db->set(array('default_status' => 1))->where('tbl_user_id', $user_id)->update('tbl_users_groups');
        
        // TODO: check if user_id is not empty
        $message[] = empty($user_id) ? 'NO USER DATA HAS BEEN CREATED.' : 'SUCCESSFULLY CREATED USER DATA.';
        if (empty($user_id)) redirect('admin/employees/add_new');

        // save to employee table
        $employee_data = array(
            'user_id'       => $user_id,
            'employee_type' => $posted_data['guard_employee_type'],
            'date_hired'    => $posted_data['guard_hired_date'],
            'created'       => date('Y-m-d H:i:s'),
            'status'        => 1
        );
        
        $employee_id = $this->employee_model->insert($employee_data);

        // TODO: check if user_id is not empty
        $message[] = empty($employee_id) ? 'NO EMPLOYEE DATA HAS BEEN CREATED.' : 'SUCCESSFULLY CREATED EMPLOYEE DATA.';
        if (empty($employee_id)) redirect('admin/employees/add_new');

        // save to employee personal information
        $employee_information = array(
            'employee_id'  => $employee_id,
            'first_name'   => strtoupper($posted_data['guard_first_name']),
            'middle_name'  => strtoupper($posted_data['guard_middle_name']),
            'last_name'    => strtoupper($posted_data['guard_last_name']),
            'gender'       => $posted_data['guard_gender'],
            'address'      => $posted_data['guard_current_address'],
            'birth_date'   => $posted_data['guard_birthdate'],
            'birth_place'  => $posted_data['guard_birthplace'],
            'civil_status' => $posted_data['guard_civil_status'],
            'citizenship'  => $posted_data['guard_citizenship'],
            'height'       => $posted_data['guard_height'],
            'weight'       => $posted_data['guard_weight'],
            'religion'     => $posted_data['guard_religion'],
            'eyes_color'   => $posted_data['guard_eye_color'],
            'hair_color'   => $posted_data['guard_hair_color'],
            'created'      => date('Y-m-d H:i:s')
        );

        $this->load->model('employee_personal_information_model');
        $employee_information_id = $this->employee_personal_information_model->insert($employee_information);
        
        // TODO: check if user_id is not empty
        $message[] = empty($employee_information_id) ? 'NO EMPLOYEE INFORMATION DATA HAS BEEN CREATED.' : 'SUCCESSFULLY CREATED EMPLOYEE INFORMATION DATA.';
        if (empty($employee_information_id)) redirect('admin/employees/add_new');

        // save to employee government id
        $employee_government_numbers = array(
            'employee_id'                => $employee_id,
            'license_number'             => $posted_data['guard_licensed'],
            'licensed_number_expiration' => $posted_data['guard_ln_expiration'],
            'sss'                        => $posted_data['guard_sss'],
            'tin'                        => $posted_data['guard_tin'],
            'hdmf'                       => $posted_data['guard_hdmf'],
            'phic'                       => $posted_data['guard_phic'],
            'created'                    => date('Y-m-d H:i:s')
        );

        $this->load->model('employee_government_number_model');
        $employee_government_ids = $this->employee_government_number_model->insert($employee_government_numbers);
        
        // TODO: check if user_id is not empty
        $message[] = empty($employee_government_ids) ? 'NO EMPLOYEE GOVERNMENT DATA HAS BEEN CREATED.' : 'SUCCESSFULLY CREATED EMPLOYEE GOVERNMENT DATA.';
        if (empty($employee_government_ids)) redirect('admin/employees/add_new');


        // save to employee educational background
        $created = date('Y-m-d H:i:s');

        
        $posted_data['elementary']['employee_id'] = $employee_id;
        $posted_data['elementary']['created'] = $created;
        $employee_educational[] = $posted_data['elementary'];
        
        $posted_data['secondary']['employee_id'] = $employee_id;
        $posted_data['secondary']['created'] = $created;
        $employee_educational[] = $posted_data['secondary'];

        $posted_data['vocational_degree']['employee_id'] = $employee_id;
        $posted_data['vocational_degree']['created'] = $created;
        $employee_educational[] = $posted_data['vocational_degree'];

        $posted_data['associate_degree']['employee_id'] = $employee_id;
        $posted_data['associate_degree']['created'] = $created;
        $employee_educational[] = $posted_data['associate_degree'];

        $posted_data['bachelor_degree']['employee_id'] = $employee_id;
        $posted_data['bachelor_degree']['created'] = $created;
        $employee_educational[] = $posted_data['bachelor_degree'];

        $posted_data['master_degree']['employee_id'] = $employee_id;
        $posted_data['master_degree']['created'] = $created;
        $employee_educational[] = $posted_data['master_degree'];

        $posted_data['doctorate_degree']['employee_id'] = $employee_id;
        $posted_data['doctorate_degree']['created'] = $created;
        $employee_educational[] = $posted_data['doctorate_degree'];

        $educational_background = $this->db->insert_batch('tbl_employee_educational_background', $employee_educational);
            
        $this->session->set_flashdata('success', strtolower(ucwords(implode(' ', $message))));
        redirect('admin/employees');
    }
}
// End of file Employees.php
// Location: ./application/controller/Employees.php