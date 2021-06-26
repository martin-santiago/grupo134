<?php include('templates/header.html');   ?>
<body>
    <h1 align="center">Consultas</h1>

    <br>
    <h3> consulta 1 </h3>
    <p> Presione el botón para consultar por las direcciones de todas las unidades de la empresa de despachos  </p>
    <form align="center" action="consultas/consulta1.php" method="post">
    <input type="submit" value="Buscar">
    </form>
    <br>
    <h3> consulta 2 </h3>
    <p> Ingresa una comuna y te entregaremos todos los vehiculos de las unidades de dicha comuna  </p>
    <form align="center" action="consultas/consulta2.php" method="post">
    Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
    </form>
    <br>



    <h3> consulta 3 </h3>
    <p> Ingresa una comuna y seleccione un año para consultar por los vehiculos que han hecho despachos en esa comuna en ese año  </p>
    <form align="center" action="consultas/consulta3.php" method="post">
    Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
  
    <div class="from-group mb-3">
        <label for="">Año:</label>
        <select name="ano" class="form-control">
            <option value="">--Selecciona un año--</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select>
    </div>

    <input type="submit" value="Buscar">
    </form>

    <h3> consulta 4 </h3>
    <p> Ingresa un tipo de vehículo y dos edades para consultar por los despachos hechos por ese tipo de vehiculo y un repartidor en el rango de edad escogido   </p>
    <p> Los tipos de vehiculos son: auto,moto,camioneta,bicicleta,camion.</p>
    <form align="center" action="consultas/consulta4.php" method="post">
    Tipo de vehiculo:
    <input type="text" name="vehiculo_elegido">
    <br/>
 <! -- para hacer el dropdown nos ayudamos de:https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/ --> 


    <?php require("config/conexion.php"); ?>
    <div align="left">
    <p>Seleccione una edad inferior:</p>
    <form class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
    <label for="edad1" class="sr-only">Edad inferior:</label>
    <select name = "edad1", id = "edad1", class="form-control" >
    <option value="">Seleccione:</option>
    <?php
    $query = $db->prepare("SELECT * FROM edades");
    $query->execute();
    $data = $query->fetchAll();

    foreach ($data as $valores):
    echo '<option value="'.$valores[0].'">'.$valores[0].'</option>';
    endforeach;
    ?>
    </select>
    </div>

    <div align="left">
    <p>Seleccione una edad superior:</p>
    <form class="form-inline">
    <div class="form-group mx-sm-3 mb-3">
    <label for="edad2" class="sr-only">Edad superior:</label>
    <select name ="edad2", id= "edad2", class="form-control" >
    <option value="">Seleccione:</option>
    <?php
    $query = $db->prepare("SELECT * FROM edades");
    $query->execute();
    $data = $query->fetchAll();

    foreach ($data as $valores):
    echo '<option value="'.$valores[0].'">'.$valores[0].'</option>';
    endforeach;
    ?>
    </select>
    </div>
    <button class="btn btn-primary mb-2 mb-3">Enviar</button>
        
    </form>
  
    <h3> consulta 5 </h3>
    <p> Ingresa 2 comunas para consultar los jefes de unidades que realizan despacho a esas 2 comunas</p>
    <form align="center" action="consultas/consulta5.php" method="post">
    Primera comuna:
    <input type="text" name="comuna1">
    Segunda comuna:
    <input type="text" name="comuna2">
    <br>
    <input type="submit" value="Buscar">
    </form>
    <br>

    <h3> consulta 6 </h3>
    <p> Ingrese un tipo de vehiculo y consultarás por la unidad que más despachos ha realizado con ese tipo de vehiculos</p>
    <p> Los tipos de vehiculos son: auto,moto,camioneta,bicicleta,camion.</p>
    <form align="center" action="consultas/consulta6.php" method="post">
    Tipo de vehiculo:
    <input type="text" name="tipo_vehiculo">
    <br>
    <input type="submit" value="Buscar">
    </form>
    <br>


</body>