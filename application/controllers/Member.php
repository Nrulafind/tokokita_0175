<?php
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mmember');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['member'] = $this->Mmember->join2table()->result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }
    public function getid_member($id)
    {
        $datawhere = array('idkurir' => $id);
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $datawhere)->row_object();
        $this->template->load('layout_admin', 'admin/');
    }
}
