<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php");
    
    $comuna1 = $_POST["comuna1"];
    $comuna1 = strtolower($comuna1);
    $comuna2 = $_POST["comuna2"];
    $comuna2 = strtolower($comuna2);
    echo "<td>$comuna1</td> <td>$comuna2</td>";
    $query = " SELECT DISTINCT personal.pid, personal.pnombre, unidades.ucomuna
    FROM unidades, personal
    WHERE unidades.id_jefe = personal.pid
    AND unidades.ucomuna LIKE '%$comuna1%'
    UNION
    SELECT DISTINCT personal.pid, personal.pnombre, unidades.ucomuna
    FROM unidades, personal
    WHERE unidades.id_jefe = personal.pid
    AND unidades.ucomuna LIKE'%$comuna2%';";

    $result = $db -> prepare($query);
    $result -> execute();
    $resultados = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>ID_jefe</th>
      <th>Nombre_jefe</th>
      <th>Comuna_que_abarca_la_unidad</th>
    </tr>
  <?php
	foreach ($resultados as $resultado) {
  		echo "<tr> <td>$resultado[0]</td> <td>$resultado[1]</td> <td>$resultado[2]</td> </tr>";
	}
  ?>
</table>


</body>



<?php include('../templates/footer.html'); ?>
