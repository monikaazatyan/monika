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

       if($this->form_validation->run() != true){
           $this->load->view('vRegister'); // Display page
       }
        else{
            $form = array();
            $form['user_name'] = $this->input->post('user_name');
            $form['pass'] = md5($this->input->post('password'));
            $form['email'] = $this->input->post('email');
            if($this->create_user( $form['user_name'],  $form['pass'], $form['email'])){
                $data['user_name'] = $form['user_name'];
                $this->load->view('success_page', $data);
            }
            else{
                echo "Sorry, Couldn't Process Yor Form";
            }
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
        else{
            return true;
        }
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

    public function create_user($user, $pass, $email){
        $data = array(
            'user_name' => $this->protect($user),
            'email' => $this->protect($email),
            'type' => '0' ,
            'password' => $this->protect($pass)
        );
        if($this->db->insert('users', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function protect($str){
        return $str;
    }

}
