<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{
    public function dashboard()
    {
        $this->template->load('layout_admin', 'admin/dashboard');
    }
    public function index()
    {
        $this->load->view('admin/form_login');
    }
}
