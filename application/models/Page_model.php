<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @author
 */
class Page_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $_table = 'tbl_pages';
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $primary_key = 'id';
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $return_type = 'array';

    public function get_no_parent()
    {
        $pages = $this->get_many_by(array('parent_id', 0));

        $array = array(0 => 'No Parent');
        
        if (count($pages)) {

            foreach ($pages as $page) {

                $array[$page['id']] = $page['name']; 

            }

        }

        return $array;
    }

    public function get_with_parent($id = NULL, $single = FALSE)
    {
        $this->db->join('pages as p', 'pages.parent_id = p.id', 'left');

        if ($id != NULL) {
            $a = $this->get_by($id);
        } else {
            $a = $this->get_many_by(array('parent_id !=' => 0));
        }
    }

    public function get_nested()
    {
        $pages = $this->get_all();

        $array = array();

        foreach ($pages as $page) {
            if ( ! $page['parent_id']) {
                $array[$page['id']] = $page;
            } else {
                $array[$page['parent_id']]['children'][] = $page;
            }
        }

        return $array;
    }

    public function save_order_page($pages)
    {
        if (count($pages)) {

            foreach ($pages as $order => $page) {
                // dump($page);
                if ($page['item_id'] != '') {
                    $data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
                    $this->update($page['item_id'], $data);
                    // dump($this->db->last_query());
                }
            }
        }
    }
}
// End of file Page_model.php
// Location: ./application/model/Page_model.php