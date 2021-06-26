<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");

    $comuna = $_POST["comuna_elegida"];
    $comuna = strtolower($comuna);
    $ano = $_POST["ano"];
    
    $query = "SELECT vehiculos.vid, vehiculos.vpatente, despachos.did, direcciones.comuna, despachos.dfecha
    FROM vehiculos, despachos, direcciones
    WHERE vehiculos.vid = despachos.id_vehiculo 
    AND despachos.id_destino = direcciones.id_direccion
    AND direcciones.comuna LIKE '%$comuna%' 
    AND despachos.dfecha BETWEEN '$ano-01-01 00:00:01' AND '$ano-12-31 23:59:59';";

    $result = $db -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID_Vehiculo </th>
      <th>Patente_vehículo</th>
      <th>ID_Despacho</th>
      <th>Comuna</th>
      <th>Fecha_despacho</th>
    </tr>

  <?php
	foreach ($resultados as $resultado) {
  		echo "<tr> <td>$resultado[0]</td> <td>$resultado[1]</td> <td>$resultado[2]</td> <td>$resultado[3]</td> <td>$resultado[4]</td></tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
