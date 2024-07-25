<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes_model extends CI_Model {

    public function get_all_notes() {
        $this->db->select('notes.*, employee.first_name as creator_first_name, employee.last_name as creator_last_name');
        $this->db->from('notes');
        $this->db->join('employee', 'employee.id = notes.created_by', 'left');
        return $this->db->get()->result();
    }
    public function create_note($data) {
        $this->db->insert('notes', $data);
        return $this->db->insert_id();
    }

    public function share_note($note_id, $employee_id) {
        $data = array(
            'note_id' => $note_id,
            'employee_id' => $employee_id
        );
        $this->db->insert('note_shares', $data);
    }

    public function stop_sharing_note($note_id) {
        $this->db->where('note_id', $note_id);
        $this->db->delete('note_shares');
    }

    public function get_shared_notes($employee_id) {
        $this->db->select('notes.*, employee.first_name, employee.last_name');
        $this->db->from('notes');
        $this->db->join('note_shares', 'note_shares.note_id = notes.id');
        $this->db->join('employee', 'employee.id = notes.created_by', 'left');
        $this->db->where('note_shares.employee_id', $employee_id);
        return $this->db->get()->result();
    }
}
?>
