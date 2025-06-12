<?php

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $role = $this->session->userdata('role');
        if ($role <> 2) {
            redirect(site_url('site'));
        }
    }

    // =====================
    // Dashboard / Index
    // =====================
    public function index()
    {
        $this->template->load('admin/template', 'admin/home',);
    }

    // =====================
    // Upload File
    // =====================
    public function uploadFile()
    {
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

    // =====================
    // Gallery
    // =====================
    public function gallery()
    {
        $data = array(
            'judul' => 'Berita',
            'dt_gallery' => $this->m_umum->get_data('gallery'),
        );
        $this->template->load('admin/template', 'admin/gallery', $data);
    }

    public function simpan_gallery()
    {
        $this->db->set('id_gallery', 'UUID()', FALSE);
        $nama_gallery = $this->input->post('nama_gallery');
        $ket = $this->input->post('ket');
        $file = $this->uploadFile();

        $data = array(
            'nama_gallery' => $nama_gallery,
            'ket' => $ket,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'gallery');
        $this->session->set_flashdata('success');
        redirect('admin/gallery');
    }

    public function update_gallery()
    {
        $id_gallery = $this->input->post('id_gallery');
        $nama_gallery = $this->input->post('nama_gallery');
        $ket = $this->input->post('ket');
        $old_file = $this->input->post('old_file');

        if (!empty($_FILES["file"]["name"])) {
            $file = $this->uploadFile();
        } else {
            $file = $old_file;
        }

        $data_update = array(
            'nama_gallery' => $nama_gallery,
            'ket' => $ket,
            'file' => $file
        );

        $where = array('id_gallery' => $id_gallery);
        $res = $this->m_umum->UpdateData('gallery', $data_update, $where);

        if ($res) {
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error_update', 'Gagal mengupdate data.');
        }

        redirect('admin/gallery');
    }

    public function delete_gallery($id)
    {
        $this->m_umum->hapus('gallery', 'id_gallery', $id);
        $this->session->set_flashdata('delete', 'Data berhasil dihapuskan');
        redirect('admin/gallery');
    }

    // =====================
    // Fungsi Tambahan Lainnya Bisa Ditambah di Sini
    // =====================
}
