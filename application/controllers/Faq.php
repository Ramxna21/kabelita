<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_faq');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index() {
        $data['title'] = 'Frequently Asked Questions';
        $data['faqs'] = $this->M_faq->get_all_faqs();
        
        // Load user view
        $this->template->load('site/template2', 'site/faq', $data);
    }
    
    // The following methods have been moved to Admin controller
    // They remain here in case they're still used elsewhere, but should be removed if not needed
    
    /* 
    // These methods are now handled in the Admin controller
    
    public function add() {
        // Admin-only function, now in Admin controller
    }
    
    public function update() {
        // Admin-only function, now in Admin controller
    }
    
    public function delete($id) {
        // Admin-only function, now in Admin controller
    }
    */
}