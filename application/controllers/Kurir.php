<?php
class kurir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kurir/index_kurir', $data);
    }
    public function add()
    {
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kurir/add_kurir');
    }
    public function save()
    {
        $namaKurir = $this->input->post('namaKurir');
        $dataInsert = array('namaKurir' => $namaKurir);
        $this->Mcrud->insert('tbl_kurir', $dataInsert);
        redirect('index_kurir');
    }
    public function getid($id)
    {
        $datawhere = array('idKurir' => $id);
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kurir/edit_kurir', $data);
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $dataUpdate = array('namaKurir' => $namaKurir);
        $this->Mcrud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
        redirect('index_kurir');
    }
    public function delete($id)
    {
        $datawhere = array('idKurir' => $id);
        $this->Mcrud->delete('tbl_kurir', $datawhere);
        redirect('index_kurir');
    }
}
