  <div class="box-body">
         <form role="form" name="crear-admin" id="crear-admin" method="POST" action="insertar-admin.php">  

        <!--   <form role="form" name="crear-admin" id="crear-admin"  action="insertar-admin.php">  -->
              <div class="box-body">
                <div class="form-group">
                  <label for="usuario">Usuario:</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                </div>
                
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Usuario">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
                </div>


                <!--  PARA AGREGAR UN ARCHIVO:
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>

                PARA CHECK:
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>   -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="agregar-admin" value="1">
                          <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
            </form>
        </div>


    
          <script src="js/admin-ajax.js"></script>
      