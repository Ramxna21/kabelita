<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_faq extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_faq');
        $role = $this->session->userdata('role');
        if ($role <> 2) {
            redirect(site_url('site'));
        }
    }
    
    public function index($id = NULL) {
        if ($id === NULL) {
            redirect('admin/faq');
        }
        
        $faq = $this->m_faq->get_faq($id);
        
        if (!$faq) {
            $notif = "FAQ tidak ditemukan";
            $this->session->set_flashdata('error');
            redirect('admin/faq');
        }
        
        $result = $this->m_faq->delete_faq($id);
        
        if ($result) {
            $this->session->set_flashdata('delete');
        } else {
            $notif = "Hapus FAQ Gagal";
            $this->session->set_flashdata('error');
        }
        
        redirect('admin/faq');
    }
    
    public function confirm($id) {
        $faq = $this->m_faq->get_faq($id);
        
        if ($faq) {
            $data = array(
                'judul' => 'Konfirmasi Hapus FAQ',
                'faq' => $faq
            );
            $this->template->load('admin/template', 'admin/delete_confirm_faq', $data);
        } else {
            $notif = "FAQ tidak ditemukan";
            $this->session->set_flashdata('error');
            redirect('admin/faq');
        }
    }
}