<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @author	
 */
class City_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @author	
     */
    protected $_table = 'tbl_cities';
 
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


    public function get_city_with_province()
    {
        $this->db->select('tbl_cities.*, p.name as province_name')->join('tbl_provinces as p', 'tbl_cities.province_id = p.id','left');

        return $this->get_all();
    }
 
}
// End of file City_model.php
// Location: ./application/model/City_model.php