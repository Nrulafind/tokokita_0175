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
        $this->template->load('layout_admin', 'admin/kurir/form_edit', $data);
    }
    public function status_member_aktifkan($id)
    {
        $datawhere = array('idkonsumen' => $id);
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', $datawhere)->row_object();
        if ($data['member']->statusAktif == 'Y') {
            # Error
            $data['error'] = '<div class="alert alert-danger">Member Sudah Aktif</div>';
            $data['member'] = $this->Mmember->join2table()->result();
            $this->template->load('layout_admin', 'admin/member/index', $data);
        } elseif ($data['member']->statusAktif == 'N') {
            #Activate
            $dataUpdate = array(
                'statusAktif' => 'Y'
            );
            $this->Mmember->update_status('tbl_member', $dataUpdate, 'idkonsumen', $id);
            redirect('member/index');
        }
    }
    public function status_member_nonaktif($id)
    {
        $datawhere = array('idkonsumen' => $id);
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', $datawhere)->row_object();
        if ($data['member']->statusAktif == 'N') {
            #error
            $data['error'] = '<div class="alert alert-danger">Member sudah NonAktif.</div>';
            $data['member'] = $this->Mmember->join2table()->result();
            $this->template->load('layout_admin', 'admin/member/index', $data);
        } elseif ($data['member']->statusAktif == 'Y') {
            # Activate
            $dataUpdate = array(
                'statusAktif' => 'N'
            );
            $this->Mmember->update_status('tbl_member', $dataUpdate, 'idkonsumen', $id);
            redirect('member/index');
        }
    }
}
