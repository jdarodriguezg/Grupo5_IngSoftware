  <!-- Main content -->
  <script src="<?= base_url() ?>static/dist/js/aplication.js" type="text/javascript" charset="utf-8" async defer></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cargar archivo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">cargar archivo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="container">
              <div class="row">
                    <div class="col-md-2">
                    </div>

                    <div class="col-md-8">
                          <?php echo $error;?>
                          <div class="box box-primary">
                             <div class="box-header">
                                <h2>Agregue los datos necesarios para iniciar la carga del archivo!</h2>
                             </div>
                             <div class="box-body">
                                <?php echo form_open_multipart('/FileController/obtenerDatos');?>
                                <?= form_label('Seleccione el nombre de la entidad','identidad') ?>
                                <select name="identidad" class="form-control">
                                      <?php

                                        foreach($entidades as $row)
                                        { 
                                           echo '<option value="'.$row->id.'">'.$row->Nombre_EntidadPago.'</option>';
                                        }
                                       ?>
                                </select>

                                <?= form_label('Seleccione el archivo a cargar  ','userfiles') ?>
                                <?php 
                                    $entradaNombre = array('id' => 'filename',
                                                               'type' => 'text',
                                                               'class' => 'form-control',
                                                               'readonly' => 'true'
                                                                );
                                    $entradaArchivo = array('id' => 'browser',
                                                               'type' => 'file',
                                                               'class' => 'file',
                                                               'name' => 'userfile',
                                                               'onChange' => 'Handlechange()'
                                                                );
                                 ?>            
                            
                                
                                  <div class="input-group">
                                    <?= form_input($entradaNombre) ?>
                                     <div class="input-group-btn">
                                      <label class="fileContainer btn btn-primary" >
                                        Seleccionar
                                      <?= form_input($entradaArchivo) ?>
                                      </label>
                                  </div>
                                </div>         
                               
                                  
                                  
                                
                                
                              <?php 
                                $datos = array('class' => 'btn btn-success');
                               ?>
                        
                            </div>
                            <div class="box-footer text-center">
                               <?= form_submit('','Cargar archivo',$datos) ?>
                                <?= form_close() ?>
                             </div>
                          </div> 
                      </div>
                <div class="col-md-2">

                </div>  
              </div>
       </div> 
    </section>
    <!-- /.content -->
  </div>