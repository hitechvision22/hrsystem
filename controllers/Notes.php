<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('notes_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model'); 
        if($this->session->userdata('user_login_access') != 1) redirect(base_url() , 'refresh');
    }

    public function index() {
        $data['notes'] = $this->notes_model->get_all_notes();
        $data['title'] = "Notes";
        $this->load->view('backend/notes', $data);
    }

    public function create() {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'remark' => $this->input->post('remark'),
            'created_by' => $this->session->userdata('user_login_id'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $insert_id = $this->notes_model->create_note($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Note créée avec succès');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la création de la note');
        }
        redirect('notes');
    }

    public function share($note_id) {
        $employee_id = $this->input->post('employee_id');
        $result = $this->notes_model->share_note($note_id, $employee_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Note partagée avec succès');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors du partage de la note');
        }
        redirect('notes');
    }

    public function stop_sharing($note_id) {
        $result = $this->notes_model->stop_sharing_note($note_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Partage de la note arrêté');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de l\'arrêt du partage de la note');
        }
        redirect('notes');
    }

    public function shared() {
        $employee_id = $this->session->userdata('user_login_id');
        $data['notes'] = $this->notes_model->get_shared_notes($employee_id);
        $data['title'] = "Notes partagées";
        $this->load->view('backend/shared_notes', $data);
    }

    public function get_note_details($note_id) {
        $note = $this->notes_model->get_note_by_id($note_id);
        echo json_encode($note);
    }
}
