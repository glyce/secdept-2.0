<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Frontend_controller extends MY_Controller {
 
    /**
     * Some description here
     * 
     * @param
     * @return
     */
    function __construct()
    {
        parent::__construct();

        $this->load->model('page_model');
        $this->data['menus'] = $this->page_model->get_all();
    }
}
// End of file Frontend_controller.php
// Location: ./application/controller/Frontend_controller.php