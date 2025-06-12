<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_faq extends CI_Model {
    
    private $table = 'tbl_faq';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_faqs() {
        return $this->db->get($this->table)->result();
    }
    
    public function get_faq($id) {
        return $this->db->where('tbl_faq_id', $id)->get($this->table)->row();
    }
    
    public function add_faq($data) {
        $this->db->set('tbl_faq_id', 'UUID()', FALSE);
        return $this->db->insert($this->table, $data);
    }
    
    public function update_faq($id, $data) {
        return $this->db->where('tbl_faq_id', $id)->update($this->table, $data);
    }
    
    public function delete_faq($id) {
        return $this->db->where('tbl_faq_id', $id)->delete($this->table);
    }
}