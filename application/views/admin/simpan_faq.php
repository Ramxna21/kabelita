<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan_faq extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_faq');
        $role = $this->session->userdata('role');
        if ($role <> 2) {
            redirect(site_url('site'));
        }
    }
    
    public function index() {
        $this->db->set('tbl_faq_id', 'UUID()', FALSE);
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            redirect('admin/faq');
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            ];
            
            $result = $this->m_faq->add_faq($data);
            
            if ($result) {
                $this->session->set_flashdata('success');
            } else {
                $notif = "Tambah FAQ Gagal";
                $this->session->set_flashdata('error');
            }
            
            redirect('admin/faq');
        }
    }
}