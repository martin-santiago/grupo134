<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");

    $tipo = $_POST["tipo_vehiculo"];
    $tipo = strtolower($tipo);
    
    $query = "SELECT Unidades.uid, COUNT(Vehiculos.vid) as Cantidad
    FROM Vehiculos, Unidades
    WHERE Vehiculos.vtipo LIKE '%$tipo%' AND Vehiculos.id_unidad = Unidades.uid
    GROUP BY Unidades.uid
    HAVING COUNT(Vehiculos.vid) = (
    SELECT DISTINCT COUNT(Vehiculos.vid) as Cantidad
    FROM Vehiculos, Unidades
    WHERE Vehiculos.vtipo LIKE '%$tipo%' AND Vehiculos.id_unidad = Unidades.uid
    GROUP BY Unidades.uid
    ORDER BY Cantidad DESC
    LIMIT 1);
    
    ";

    $result = $db -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID_unidad</th>
      <th>Cantidad</th>
    </tr>
  <?php
	foreach ($resultados as $resultado) {
  		echo "<tr> <td>$resultado[0]</td> <td>$resultado[1]</td></tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
