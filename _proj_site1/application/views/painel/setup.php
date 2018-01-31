<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="<?php echo base_url('asserts/css/style.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('asserts/css/bootstrap.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('asserts/css/login.css') ?>" type="text/css">
</head>
<body class="text-center">


<?php

        echo form_open('',array('class'=>'form-signin'));

            echo form_label('Nome de Login','login');
            echo form_input('login',set_value('login'), array('class'=>'form-control'));

            echo form_label('Email Administrador','email');
            echo form_input('email',set_value('email'), array('class'=>'form-control'));

            echo form_label('Senha','senha');
            echo form_password('senha',set_value('senha'), array('class'=>'form-control'));

            echo form_label('Repita a Senha','senha2');
            echo form_password('senha2',set_value('senha2'), array('class'=>'form-control'));

            echo form_submit('enviar','Salvar Dados', array('class'=>'btn btn-primary'));

        echo form_close();


?>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="<?php echo base_url('asserts/js/bootstrap.min.js') ?>" ></script>

</body>
</html>