<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 * @category	category
 *
 */
class Daily_time_activity_model extends MY_Model {
 
    /**
     * Some description here
     * 
     *
     */
    protected $_table = 'tbl_daily_time_activity';
 
    /**
     * Some description here
     * 
     *
     */
    protected $primary_key = 'id';
 
    /**
     * Some description here
     * 
     *
     */
    protected $return_type = 'array';

    /**
     * Some description here
     * 
     *
     */
    protected $after_get = array('prep_data_after_get');

    /**
     * Some description here
     * 
     *
     */
    protected function prep_data_after_get($daily_activity)
    {
        if ( ! isset($daily_activity)) return false;

        $daily_activity['status_label'] = $daily_activity['status'] == 1 ? '<label class="label label-success">Approved</label>' : ($daily_activity['status'] == 2 ? '<label class="label label-danger">Declined</label>' : '<label class="label label-info">On Process</label>');

        return $daily_activity;
    }

    public function get_employee_data()
    {
        $this->db->select('tbl_daily_time_activity.*, user.first_name, user.last_name');
        $this->db->join('tbl_employees as employee', 'tbl_daily_time_activity.employee_id = employee.id', 'left');
        $this->db->join('tbl_users as user', 'employee.user_id = user.id', 'left');

        return $this->get_all();
    }
}
// End of file Daily_time_activity.php
// Location: ./application/model/Daily_time_activity.php