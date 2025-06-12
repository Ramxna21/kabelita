<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_faq extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_faq');
        $role = $this->session->userdata('role');
        if ($role <> 2) {
            redirect(site_url('site'));
        }
    }

    public function uploadFile() {
        $config['encrypt_name'] = TRUE;
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;
    }
    
    public function index() {
        $data = array(
            'judul' => 'Kelola FAQ',
            'dt_faq' => $this->m_faq->get_all_faqs(),
        );
        $this->template->load('admin/template', 'admin/faq', $data);
    }
    
    public function simpan_faq() {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            redirect('admin_faq');
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
            
            redirect('admin_faq');
        }
    }
    
    public function update_faq() {
        $this->form_validation->set_rules('tbl_faq_id', 'ID', 'required');
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            redirect('admin_faq');
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
            
            redirect('admin_faq');
        }
    }

    public function delete_faq($id) {
        $faq = $this->m_faq->get_faq($id);
        
        if (!$faq) {
            $notif = "FAQ tidak ditemukan";
            $this->session->set_flashdata('error');
            redirect('admin_faq');
        }
        
        $result = $this->m_faq->delete_faq($id);
        
        if ($result) {
            $this->session->set_flashdata('delete');
        } else {
            $notif = "Hapus FAQ Gagal";
            $this->session->set_flashdata('error');
        }
        
        redirect('admin_faq');
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
            redirect('admin_faq');
        }
    }
}