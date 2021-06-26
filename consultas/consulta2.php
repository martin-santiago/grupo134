<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");

    $comuna = $_POST["comuna_elegida"];
    $comuna = strtolower($comuna);
    
    $query = "SELECT vehiculos.vpatente, vehiculos.vtipo, vehiculos.vestado, unidades.uid, direcciones.comuna
    FROM vehiculos, unidades, direcciones
    WHERE vehiculos.id_unidad = unidades.uid AND unidades.udireccion = direcciones.id_direccion AND direcciones.comuna LIKE '%$comuna%';";

    $result = $db -> prepare($query);
    $result -> execute();
    $vehiculos = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>Patente</th>
      <th>Tipo</th>
      <th>Estado</th>
      <th>ID_Unidad</th>
      <th>Comuna</th>
    </tr>
  <?php
	foreach ($vehiculos as $vehiculo) {
  		echo "<tr> <td>$vehiculo[0]</td> <td>$vehiculo[1]</td> <td>$vehiculo[2]</td> <td>$vehiculo[3]</td> <td>$vehiculo[4]</td></tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
