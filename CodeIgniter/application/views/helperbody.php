<body>
	<?= form_open('/FormController/recibirDatos') ?>
	<?php
	/* Este código es un ejemplo de como usar formularios no tiene que ver con el aplicativo sin embargo apartir de este se pueden construir formularios como el de subir archivo
	*/
	    $atributosTagNombre = array(
	    	'name' => 'nombreArchivo',
	    	'placeholder' => 'ingresa nuevo archivo'
	    );

	    $atributosTagNumeroFilas = array(
	    	'name' => 'numeroFilas',
	    	'placeholder' => 'ingresa numero de filas'
	    );

	    $atributosIdEntidad = array(
	    	'name' => 'idEntidad',
	    	'placeholder' => 'ingrese el id de la entidad'
	    );

	    $atributosTotal = array(
	    	'name' => 'totalRecaudado',
	    	'placeholder' => 'ingrese el total recaudado'
	    );

	    $atributosFecha = array(
	    	'name' => 'fecha',
	    	'placeholder' => 'ingrese la fecha correspondiente'
	    ); 
	?>

    <?= form_label('nombre archivo','nombreArchivo') ?>
    <?= form_input($atributosTagNombre) ?>
	
	<?= form_label('numero filas','numeroFilas') ?>
	<?= form_input($atributosTagNumeroFilas) ?>
	
	<?= form_label('idEntidad','idEntidad') ?>
	<?= form_input($atributosIdEntidad) ?>
	
	<?= form_label('TotalRecaudado','totalRecaudado') ?>
	<?= form_input($atributosTotal) ?>
	
	<?= form_label('fechaActual','fecha') ?>
	<?= form_input($atributosFecha) ?>
	
	 <?php echo $this->session->userdata('username');?>

	<?= form_submit('','Subir curso') ?>
	<?= form_close() ?>
</body>
</html>