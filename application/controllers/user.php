<?php
class User extends CI_Controller {
    public function new_articles(){
        $this->load->model("user_model");
        $data['articles'] = $this->user_model->get_articles();

        $rules = array(
            "title" =>  array(
                "field" => "title",
                "label" => "title",
                "rules" => "required"
            ),

            "description" =>  array(
                "field" => "description",
                "label" => "description",
                "rules" => "required"
            )
        );

        $this->form_validation->set_rules($rules);

        if($this->form_validation->run()){
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $file_path = 'images/'.substr(md5(time()), 0, 10). '.'. $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $file_path);

            if(  $this->user_model->add_article($title,  $description, $file_path)){
               echo "uraaa";
            }
            else{
                echo "Sorry, Couldn't Process Yor Form";
            }
        } else
            $this->load->view('add_articles');

        $data['user_name'] = $_SESSION['user_name'];
        $this->load->view('header', $data);
        $this->load->view('sitebar', $data);
        $this->load->view('add_articles');
        $this->load->view('footer');
    }

}
