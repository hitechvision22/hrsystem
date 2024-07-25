<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport_model extends CI_Model {

    public function get_rapports($employee_id = null) {
        $this->db->select('rapport.*, employee.first_name, employee.last_name');
        $this->db->from('rapport');
        $this->db->join('employee', 'employee.id = rapport.employee_id');
        if ($employee_id) {
            $this->db->where('rapport.employee_id', $employee_id);
        }
        $this->db->order_by('rapport.date', 'DESC');
        return $this->db->get()->result();
    }

    public function add_rapport($data) {
        return $this->db->insert('rapport', $data);
    }
}
