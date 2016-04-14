<div style="width: 300px; margin: 0 auto;">
    <h1>Login</h1>
    <?=form_open('login')?>
    <?php if($this->session->flashdata('email')) {?>
        <?=form_input(array("name" => 'email', 'value' => $this->session->flashdata('email'), 'placeholder'=>'email'))?>
        <?=form_error("email")?>
    <?php }else {?>
        <?=form_input(array("name" => 'email', 'value'=> set_value('email'), 'placeholder'=>'email'))?>
        <?=form_error("email")?>
    <?php }?>
    </br>
    </br>
    <?=form_password(array("name" => 'password', 'placeholder'=>'password'))?>
    <?=form_error("password")?>
    </br>
    </br>
    <?php
        if($this->session->flashdata('pw_error')) {
            echo $this->session->flashdata('pw_error'); //Email exist, incorrect password returned error
        }
        else{
            echo form_error('pw_error'); // Returns controller error
        }
    ?>

    <?=form_submit(array('name'=>'login', 'value'=>'login'))?>

    <?=form_close()?>
</div>
