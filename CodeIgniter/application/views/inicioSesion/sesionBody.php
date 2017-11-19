
<body>
<div class="body"></div>
<div class="grad">
<div class="header">

    <div>Iniciar<span> <b>Sesión</b></span></div>
</div>
<br>

<div class="login">
	<div class="message">
	 <?= $message ?>
    </div>
    <?= form_open('/LoginController/capturarDatosSesion') ?>
    <?php
    	$atributosTagUsername = array(
	    	'name' => 'username',
	    	'placeholder' => '&#128590; Usuario'
	    );

	    $atributosTagPassword = array(
	    	'name' => 'password',
	    	'placeholder' => '&#128272; Contraseña',
	    	'type' => 'password' 
	    );
	?>

    <?= form_input($atributosTagUsername) ?>
	<?= form_input($atributosTagPassword) ?>
	<!--<?php echo $this->recaptcha->render(); ?>-->

    <?= form_submit('','Login') ?>
	<?= form_close() ?>

</div>
</div>
</body>