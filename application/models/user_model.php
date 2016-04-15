<?php
class User_model extends CI_Model{

       public function create_user($user, $pass, $email){
           $data = array(
               'user_name' => $user,
               'email' => $email,
               'type' => '0' ,
               'password' => $pass
           );
           if($this->db->insert('users', $data)){
               return true;
           }
           return false;
    }

    public function add_article($title, $description, $image){
        $id = $_SESSION['id'];
        $data = array(
            'title' => $title,
            'description' => $description,
            'image' => $image ,
            'user_id' => $id ,
            'date' => date('d-m-Y')
        );
        if($this->db->insert('articles', $data)){
            return true;
        }
        return false;
    }

    public function get_article_by_id(){
        $id = $_SESSION['id'];
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 1){
           return $query->result();
        }
        return false;
    }


}
?>