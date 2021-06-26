<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");

    $tipo_vehiculo = $_POST["vehiculo_elegido"];
    $tipo_vehiculo = strtolower($tipo_vehiculo);
    $edad1 = $_POST["edad1"];
    $edad2 = $_POST["edad2"];
    echo "<td>$tipo_vehiculo</td> <td>$edad1</td> <td>$edad2</td> ";
    
    $query = "SELECT vehiculos.vid, vehiculos.vpatente, vehiculos.vtipo, despachos.did, personal.pid, personal.pnombre, personal.pedad
    FROM vehiculos, despachos, personal_rep, personal
    WHERE vehiculos.vid = despachos.id_vehiculo
    AND despachos.id_personal = personal_rep.id_personal
    AND personal_rep.id_personal = personal.pid
    AND vehiculos.vtipo LIKE '%$tipo_vehiculo%'
    AND personal.pedad BETWEEN $edad1 AND $edad2;";

    $result = $db -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID_Vehiculo </th>
      <th>Patente_vehículo</th>
      <th>Tipo_vehiculo</th>
      <th>ID_Despacho</th>
      <th>ID_de_Personal</th>
      <th>Nombre_de_personal</th>
      <th>Edad_de_personal</th>
    </tr>

  <?php
	foreach ($resultados as $resultado) {
  		echo "<tr> <td>$resultado[0]</td> <td>$resultado[1]</td> <td>$resultado[2]</td> <td>$resultado[3]</td> <td>$resultado[4]</td> <td>$resultado[5]</td> <td>$resultado[6]</td></tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
