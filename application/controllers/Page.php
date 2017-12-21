<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 */
class Page extends Frontend_controller {
 
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
    }

    public function index()
    {
        $slug = $this->uri->segment(1);
        $this->data['page_header'] = $slug;
        $this->data['page'] = ($slug != NULL) ? $this->page_model->get_by(array('slug' => $slug)) : 'index';
        $page = $slug != NULL ? $slug:'index';
        $this->frontend_template('pages/'.$page);
    }
    
}
// End of file Page.php
// Location: ./application/controller/Page.php