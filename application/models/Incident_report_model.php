<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @package	package
 */
class Incident_report_model extends MY_Model {
 
    /**
     * Some description here
     */
    protected $_table = 'tbl_incident_reports';
 
    /**
     * Some description here
     */
    protected $primary_key = 'id';
 
    /**
     * Some description here
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
 
}
// End of file Incident_report_model.php
// Location: ./application/model/Incident_report_model.php