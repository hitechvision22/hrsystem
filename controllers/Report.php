<?php
class Report extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->model('Employee_model'); // Assuming you have an Employee_model
    }

    public function index() {
        if ($this->session->userdata('role') == 'admin') {
            $data['reports'] = $this->Report_model->get_reports();
        } else {
            $employee_id = $this->session->userdata('employee_id');
            $data['reports'] = $this->Report_model->get_reports($employee_id);
        }
        $this->load->view('backend/header');
        $this->load->view('backend/sidebar');
        $this->load->view('report/list', $data);
        $this->load->view('backend/footer');
    }

    public function create() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('backend/header');
        $this->load->view('backend/sidebar');
        $this->load->view('report/create', $data);
        $this->load->view('backend/footer');
    }

    public function store() {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'employee_id' => $this->session->userdata('employee_id')
        );
        $this->Report_model->create_report($data);
        redirect('report');
    }
}
