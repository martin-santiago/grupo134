<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");

    
    $query = "SELECT unidades.uid, direcciones.nombre_calle, direcciones.comuna
    FROM direcciones, unidades
    WHERE direcciones.id_direccion = unidades.udireccion;";

    $result = $db -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID_Unidad</th>
      <th>Nombre de calle</th>
      <th>Comuna</th>
    </tr>
  <?php
	foreach ($resultados as $resultado) {
  		echo "<tr> <td>$resultado[0]</td> <td>$resultado[1]</td> <td>$resultado[2]</td> </tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
