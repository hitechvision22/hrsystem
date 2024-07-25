<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('rapport_model');
        $this->load->model('employee_model');
        $this->load->model('notice_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
    }

    public function index() {
        $data['title'] = 'Rapports';
        $data['rapports'] = $this->rapport_model->get_rapports();
        $data['employees'] = $this->employee_model->get_employees();
        $this->load->view('backend/rapport', $data);
    }

    public function employee_rapports() {
        $employee_id = $this->session->userdata('user_login_id');
        $data['title'] = 'Mes Rapports';
        $data['rapports'] = $this->rapport_model->get_rapports($employee_id);
        $this->load->view('backend/employee_rapport', $data);
    }

    public function add_rapport() {
        $this->form_validation->set_rules('titre', 'Titre', 'required|max_length[150]');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $data = array(
                'titre' => $this->input->post('titre'),
                'description' => $this->input->post('description'),
                'employee_id' => $this->session->userdata('user_login_id')
            );
            $insert = $this->rapport_model->add_rapport($data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Rapport ajouté avec succès');
            } else {
                $this->session->set_flashdata('error', 'Erreur lors de l\'ajout du rapport');
            }
        }
        redirect('rapport/employee_rapports');
    }
}
