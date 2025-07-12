<?php // include_once "includes/templates/header.php" ; 
      
      include_once "includes/templates/barra-user.php" ; 

        //require_once('includes/templates/bd_conexion.php');   

        require_once('includes/funciones/bd_conexion.php');   
        ?>

<?php # include_once "includes/tiempo_espera5.php" ; ?>

<!--?php include_once "tiempo_espera8.php" ; ?-->
<?php # include_once "post.php" ; ?>


<script  src="js/jquery-3.6.0.min.js"></script>

<?php date_default_timezone_set("America/Argentina/Buenos_Aires"); ?>







<section class="seccion contenedor">

  <h2>Registro de Usuarios</h2>

  <form id="registro" class="registro"  method="$_POST" action="registra.php" > <!--   "validar_registro.php" method="POST"  action="post.php" -->

  <div id="datos_usuario" class="registro caja clearfix">

  <div class="campo">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" size="13">  
  </div>
  
  <div class="campo">
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" size="13">
  </div>
  
    
  <div class="campo">
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" placeholder="Tu Documento" size="13">
    </div>


    <div class="campo">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Tu Email" size="13">
      </div>

        <input id="submit" type="submit" name="submit" class="button" value="Registro">  

<div id="error"></div>

</div>
</form>
</section>