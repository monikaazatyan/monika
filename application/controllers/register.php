<?php

class Register extends CI_Controller {

    public function index(){

        //validation
        $rules = array(
            "user_name" =>  array(
                "field" => "user_name",
                "label" => "user name",
                "rules" => "required|max_length[20]|min_length[5]"
            ),

            "password" =>  array(
                "field" => "password",
                "label" => "password",
                "rules" => "required|max_length[20]|min_length[6]"
             ),

            "conf_pass" =>  array(
                "field" => "conf_pass",
                "label" => "confirm password",
                "rules" => "required|matches[password]"
             ),

            "email" =>  array(
                "field" => "email",
                "label" => "email",
                "rules" => "required|valid_email|callback_email_is_taken"
            )

        );

        $this->form_validation->set_rules($rules);

       if($this->form_validation->run()){
            $user_name = $this->input->post('user_name');
            $pass = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $this->load->model("user");
            if(  $this->user->create_user($user_name,  $pass, $email)){
                $data['user_name'] = $user_name;
                $this->load->view('success_page', $data);
            }
            else{
                echo "Sorry, Couldn't Process Yor Form";
            }
        } else {
           $this->load->view('vRegister');
       }
    }

    public function username_is_taken($input){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_name', $input);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_is_taken', 'Sorry the user name <b>'. $input.'</b> is taken!');
            return false;
        }

            return true;
    }

    public function email_is_taken($input){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $input);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $this->form_validation->set_message('email_is_taken', 'Sorry the user name <b>'. $input.'</b> is taken!');
            return false;
        }
        else{
            return true;
        }
    }



}
