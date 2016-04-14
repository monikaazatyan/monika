<?php

class Login extends CI_Controller {

    public function index()
    {
        $rules = array(
            "email" =>  array(
                "field" => "email",
                "label" => "email",
                "rules" => "required|trim|callback_account_exist"
            ),

            "password" =>  array(
                "field" => "password",
                "label" => "password",
                "rules" => "required"
            )
        );
        $this->form_validation->set_rules($rules);
        if(!$this->form_validation->run()){
            $this->load->view('login');
        }
        else{
            $form['pass'] = md5($this->input->post('password'));
            $form['email'] = $this->input->post('email');
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $form['email']);
            $this->db->where('password', $form['pass']);
            $query = $this->db->get();
            if($query->num_rows() < 1){
                $this->form_validation->set_message('account_exist', 'The email you entered does not exist!');
                $this->session->set_flashdata('pw_error', "Sorry password is incorrect!");
                $this->session->set_flashdata('email', $form['email']);
                redirect('login');
            }
            else{
                $info = $query->row();
                $type = $info -> type;
                $user_name = $info -> user_name;
                $id = $info -> id;
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('email', $form['email']);
                $this->session->set_userdata('user_name', $user_name);
                $this->session->set_userdata('password', $form['pass']);
                $this->session->set_userdata('type', $type);
                $this->session->set_userdata('id', $id);
                redirect('dashboard');
            }
        }

    }

    public function account_exist($input){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $input);
        $query = $this->db->get();
        if($query->num_rows() < 1){
            $this->form_validation->set_message('account_exist', 'The email you entered does not exist!');
            return false;
        }
        else{
            return true;
        }
    }
}
