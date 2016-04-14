<div style="width: 300px; margin: 0 auto;">
    <?=form_open('register')?>
    <h1>Register</h1>
    <?=form_input(array("name" => 'user_name', 'value'=> set_value('user_name'), 'placeholder'=>'user name'))?>
    <?=form_error("user_name")?>
    </br>
    </br>
    <?=form_input(array("name" => 'email', 'value'=> set_value('email'), 'placeholder'=>'email'))?>
    <?=form_error("email")?>
    </br>
    </br>
    <?=form_password(array("name" => 'password', 'placeholder'=>'password'))?>
    <?=form_error("password")?>
    </br>
    </br>
    <?=form_password(array("name" => 'conf_pass', 'placeholder'=>'confirm password'))?>
    <?=form_error("conf_pass")?>
    </br>
    </br>
    <?=form_submit(array('name'=>'register', 'value'=>'register'))?>

    <?=form_close()?>
</div>
