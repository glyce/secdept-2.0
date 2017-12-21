<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'add_employee' => array(
		array('field' => 'name', 'label' => 'Company Name', 'rules' => 'trim|required'),
		array('field' => 'short_name', 'label' => 'Company Code', 'rules' => 'trim|required'),
		array('field' => 'description', 'label' => 'Company Description', 'rules' => 'trim|required')
    )
);