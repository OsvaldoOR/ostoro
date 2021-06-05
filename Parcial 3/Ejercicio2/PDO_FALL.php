
<?php

$conexion=new PDO("mysql:host=localhost;dbname=ostoro","root","");

    $busqueda=$conexion->prepare("Select * from personas");
    $busqueda->execute();
    $resultado = $busqueda->fetchAll();

?>

<table   class="table table-bordered">
   <tr>
      <th class="bg-primary" scope="col">Id</th>
      <th class="bg-primary" scope="col">Nombre</th>
      <th class="bg-primary" scope="col">ApPaterno</th>
      <th class="bg-primary" scope="col">ApMaterno</th>
      <th class="bg-primary" scope="col">edad</th>
      <th class="bg-primary" scope="col">telefono</th>
   </tr>
    <?php
      foreach($resultado as $res)
      {
        echo "<tr>";
        echo "<td>".$res["id"]."</td>";
        echo "<td>".$res["Nombre"]."</td>";
        echo "<td>".$res["apPaterno"]."</td>";
        echo "<td>".$res["apMaterno"]."</td>";
        echo "<td>".$res["edad"]."</td>";
        echo "<td>".$res["telefono"]."</td>";
        echo "</tr>";
      }   
    ?>
</table>