<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_faq extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $role = $this->session->userdata('role');
        if ($role <> 2) {
            redirect(site_url('site'));
        }
    }
    
    public function index() {
        $data = array(
            'judul' => 'Tambah FAQ',
        );
        $this->template->load('admin/template', 'admin/tambah_faq', $data);
    }
    
    public function simpan() {
        $this->db->set('tbl_faq_id', 'UUID()', FALSE);
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            ];
            
            $this->db->insert('tbl_faq', $data);
            $this->session->set_flashdata('success');
            redirect('admin/faq');
        }
    }
}