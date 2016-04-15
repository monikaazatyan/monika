<?php
class Dashboard extends CI_Controller {
    public function index()
    {
        if($_SESSION['type']=='0'){
            $data['user_name'] = $_SESSION['user_name'];
            $this->load->view('header', $data);
            $this->load->view('sitebar');
            $this->load->view('dashboard');
            $this->load->view('footer');
        }
        else {
            $this->load->view('dashboard_admin');
        }
    }
}
