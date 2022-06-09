<?php
class Kota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kota/index_kota', $data);
    }
    public function add()
    {
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kota/add_kota');
    }
    public function save()
    {
        $namaKota = $this->input->post('namaKota');
        $dataInsert = array('namaKota' => $namaKota);
        $this->Mcrud->insert('tbl_kota', $dataInsert);
        redirect('index_kota');
    }
    public function getid($id)
    {
        $datawhere = array('idKota' => $id);
        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/kota/edit_kota', $data);
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $dataUpdate = array('namaKota' => $namaKota);
        $this->Mcrud->update('tbl_kota', $dataUpdate, 'idKota', $id);
        redirect('index_kota');
    }
    public function delete($id)
    {
        $datawhere = array('idKota' => $id);
        $this->Mcrud->delete('tbl_kota', $datawhere);
        redirect('index_kota');
    }
}
