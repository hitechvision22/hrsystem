<?php
class Report_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_report($data) {
        return $this->db->insert('report', $data);
    }

    public function get_reports($employee_id = null) {
        if ($employee_id) {
            $this->db->where('employee_id', $employee_id);
        }
        $query = $this->db->get('report');
        return $query->result();
    }
}
