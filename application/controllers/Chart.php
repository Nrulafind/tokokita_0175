<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    public function index()
    {
        $data['kategori'] = $this->Mcrud->get_all_produk_kategori()->result();
        $data['produk_terbaru'] = $this->Mcrud->get_
        $this->template->load('layout_admin', 'admin/kategori/index', $data);
    }
    public function add()
    {
        $this->template->load('layout_admin', 'admin/kategori/form_add');
    }
    public function save()
    {
        $namaKategori = $this->input->post('namaKategori');
        $dataInsert = array('namakat' => $namaKategori);
        $this->Mcrud->insert('tbl_kategori', $dataInsert);
        redirect('kategori');
    }
    public function getid($id)
    {
        $datawhere = array('idkat' => $id);
        $data['kategori'] = $this->Mcrud->get_by_id('tbl_kategori', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/kategori/form_edit', $data);
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $namaKategori = $this->input->post('namaKategori');
        $dataUpdate = array('namakat' => $namaKategori);
        $this->Mcrud->update('tbl_kategori', $dataUpdate, 'idkat', $id);
        redirect('kategori');
    }
    public function delete($id)
    {
        $datawhere = array('idkat' => $id);
        $this->Mcrud->delete('tbl_kategori', $datawhere, 'idkat', $id);
        redirect('kategori');
    }
}
