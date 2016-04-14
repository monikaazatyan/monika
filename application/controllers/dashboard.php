<?php
class Dashboard extends CI_Controller {
    public function index()
    {
        if($_SESSION['$type']=='0'){
            $this->load->view('dashboard');
        }
        else {
            $this->load->view('dashboard_admin');
        }
    }
}
