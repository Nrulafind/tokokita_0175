<?php
class Ongkir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }
    public function index()
    {
        $data['biaya-kirim'] = $this->Mcrud->get_all_data_3table('tbl_biaya_kirim', 'tbl_kurir', 'tbl_kota', 'idkotaasal', 'idkurir', 'idkota', 'idkotatujuan')->result_array();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/ongkir/index_ongkir', $data);
    }
    public function add()
    {
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/ongkir/add_ongkir', $data);
    }
    public function save()
    {
        $asal = $this->input->post('kota-asal');
        $tujuan = $this->input->post('kota-tujuan');
        $kurir = $this->input->post('kurir');
        $biaya = $this->input->post('biaya');
        $dataInsert = array(
            'idBiayaKirim' => '',
            'idKurir' => $kurir,
            'idKotaAsal' => $asal,
            'idKotaTujuan' => $tujuan,
            'biaya' => $biaya
        );
        $this->Mcrud->Insert('tbl_biaya_kirim', $dataInsert);
        redirect('index_ongkir');
    }
    public function getid($id)
    {
        $datawhere = array('idBiayaKirim' => $id);
        $data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $datawhere)->row_object();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kelola_ongkir/ongkir/edit_ongkir', $data);
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $asal = $this->input->post('kota-asal');
        $tujuan = $this->input->post('kota-tujuan');
        $kurir = $this->input->post('kurir');
        $biaya = $this->input->post('biaya');
        $dataUpdate = array(
            'idBiayaKirim' => '',
            'idKurir' => $kurir,
            'idKotaAsal' => $asal,
            'idKotaTujuan' => $tujuan,
            'biaya' => $biaya
        );
        $this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
        redirect('index_ongkir');
    }
    public function delete($id)
    {
        $datawhere = array('idBiayaKirim' => $id);
        $this->Mcrud->delete('tbl_biaya_kirim', $datawhere);
        redirect('index_ongkir');
    }
}
