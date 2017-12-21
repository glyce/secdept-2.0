<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author
 */
class Page extends Admin_controller {
 
    /**
     * Some description here
     * 
     * @author
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
        $pages = $this->page_model->get_all();
    }

    public function order_ajax()
    {
        if (isset($_POST['sortable'])) {
            $this->page_model->save_order_page($_POST['sortable']);
        }

        $this->data = array(
            'pages' => $this->page_model->get_nested()
        );

        $this->load->view('pages/admin/ajax-order-page', $this->data);
    }

}
// End of file Page.php
// Location: ./application/controller/Page.php