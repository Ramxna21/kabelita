<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_faq extends CI_Controller {
    
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
        $this->form_validation->set_rules('tbl_faq_id', 'ID', 'required');
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            redirect('admin/faq');
        } else {
            $id = $this->input->post('tbl_faq_id');
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            ];
            
            $result = $this->m_faq->update_faq($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('update');
            } else {
                $notif = "Update FAQ Gagal";
                $this->session->set_flashdata('error');
            }
            
            redirect('admin/faq');
        }
    }
    
    public function edit($id) {
        $faq = $this->m_faq->get_faq($id);
        
        if ($faq) {
            $data = array(
                'judul' => 'Edit FAQ',
                'faq' => $faq
            );
            $this->template->load('admin/template', 'admin/edit_faq', $data);
        } else {
            $notif = "FAQ tidak ditemukan";
            $this->session->set_flashdata('error');
            redirect('admin/faq');
        }
    }
}