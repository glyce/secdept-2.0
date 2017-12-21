<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 * @author
 */
class Client_model extends MY_Model {
 
    /**
     * Some description here
     * 
     * @author
     */
    protected $_table = 'tbl_clients';
 
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


    protected $after_get = array('after_get_prep_data');

    protected function after_get_prep_data($client)
    {

        if ( ! isset($client)) return FALSE;

        $fullname = array(
            (isset($client['last_name'])) ? $client['last_name'].', ':'',
            (isset($client['last_name'])) ? $client['first_name'].' ':'',
            (isset($client['last_name'])) ? substr($client['middle_name'], 1):''
        );
        $client['fullname'] = strtoupper(implode('', $fullname));

        return $client;
    }

    /**
     * Some description here
     * 
     * @author
     */
    public function get_with_user_data($where = '', $single = FALSE)
    {
        $this->db->select('
            tbl_clients.*, u.first_name, u.middle_name, u.last_name,
            u.email, u.phone, u.active, u.profile_picture
        ');
        $this->db->join('tbl_users as u', 'tbl_clients.user_id = u.id', 'left');
        $this->db->join('tbl_cities as c', 'tbl_clients.city_id = c.id', 'left');
        $this->db->join('tbl_provinces as p', 'c.province_id = p.id', 'left');

        $fn = $single == FALSE ? 'get_many_by' : 'get_by';
        
        if ( ! empty($where)) {
            return $this->{$fn}($where);
        } else {
            return $this->get_all();
        }
    }
 
}
// End of file Client_model.php
// Location: ./application/model/Client_model.php