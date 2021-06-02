<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); //llamamos a la funcion conectar

$consulta = "SELECT id, nombre, edad, colonia, cyn, telefono FROM clientes";
$resultado = $conexion->prepare($consulta);//prepara consulta, se manda resultado y se ejecuta
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC); //fetcjall pasa todo a la variable $data
?>

<?php
//seguridad de sessiones paginacion
session_start();
error_reporting(0);
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location: Login/index.html");
    die();
}

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>ABC</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables.min.css"/>
    <!--datables de bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       
  </head>
    
  <body> 
     <header>
            <!--<h3 class="text-center text-light">ABC</h3>-->
         <h4 class="text-center text-light">Bienvenido <span class="badge badge-danger"><?php echo $_SESSION['usuario']; ?></span></h4> 
         <h4 class="text-center text-light">ABC de <span class="badge badge-danger">EMPRESA</span></h4> 
         <!--<a href="../Login/admin/cerrarsesion.php">CERRAR SESION</a>-->
         <a href=" Login/admin/cerrarsesion.php" class="btn btn-primary stretched-link">CERRAR SESION</a>
     </header>   
     <br> 
      
    <div class="container"> <!--Contenedor para el boton -->
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>  <!--Para hacer alta -->
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="container"> <!--Contenedor para la tabla -->
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">  <!--para que sea responsivo -->      
                        <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">  <!--encabezado -->   
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                              
                                <th>Edad</th>  
                                <th>Colonia</th>  
                                <th>Calle y Numero</th> 
                                <th>Telefono</th> 
                                <th>Acciones</th><!--aqui estan los botones -->   
                            </tr>
                        </thead>
                        <tbody> <!--cuerpo -->   
                            <?php                            
                                foreach($data as $dat) { //traer los datos de cada registro                                                   
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['edad'] ?></td>
                                <td><?php echo $dat['colonia'] ?></td>    
                                <td><?php echo $dat['cyn'] ?></td>  
                                <td><?php echo $dat['telefono'] ?></td>  
                                <td></td>
                            </tr>
                            <?php                            
                                }                                                  
                            ?>                               
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para todas las acciones del ABC-->
<div class="modal fade" id="modalABC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5> <!--El titulo se genera segun la accion o boton precionado-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formClientes">    <!---->
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="edad" class="col-form-label">Edad:</label>
                <input type="number" class="form-control" id="edad">
                </div>
                <div class="form-group">
                <label for="colonia" class="col-form-label">Colonia:</label>
                <input type="text" class="form-control" id="colonia">
                </div>                
                <div class="form-group">
                <label for="cyn" class="col-form-label">Calle y Numero:</label>
                <input type="text" class="form-control" id="cyn">
                </div>
                <div class="form-group">
                <label for="telefono" class="col-form-label">Telefono:</label>
                <input type="text" class="form-control" id="telefono">
                </div>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
