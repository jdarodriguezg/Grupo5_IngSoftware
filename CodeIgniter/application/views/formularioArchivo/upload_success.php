  <!-- Main content -->
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
                <div class="box box-success">
                  <div class="box-header">
                      <h3>Enhorabuena!, El archivo se cargó exitosamente</h3>
                      </div>
                      <div class="box-body">
                          <table class="table table-bordered">
                              <tbody>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Detalle</th>
                                    <th>Valor</th>
                                  </tr>              
                                       <?php
                                       $n = 1;

                                        foreach ($data_encabezado as $key => $value) {
                                            echo '<tr><td>'.$n.'</td><td>'.$key.'</td><td>'.$value.'</td><tr>';
                                            $n ++;
                                          }                                    
                                      ?>
                            </tbody>
                          </table> 
                      </div>
                      <div class="box-footer">
                          <p><?php echo anchor('/FileController/', 'Cargar otro archivo!'); ?></p>
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