<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar apoyo</title>
</head>
<body>
    <h1>Registrar apoyo</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un apoyo-->
    <form action="modelo/reg_apoyo.php" method="post" enctype="multipart/form-data">
        <h2>Apoyo</h2>
        <label for="">Código:</label> 
        <input type="text" name="id_apoyo" id="" required>
        <br><br>
        <label for="">Nombre:</label> 
        <input type="text" name="nombre_apoyo" id="" required>
        <br><br>
        <label for="">Correo:</label> 
        <input type="text" name="correo_apoyo" id="" required>
        <br><br>
        <label for="">Password:</label> 
        <input type="text" name="password_apoyo" id="" required>
        <br><br>
        <label for="foto_apoyo">Foto:</label> 
        <input type="file" name="foto_apoyo" accept="image/*" capture="user" required>
        <br><br>
        <label for="">Universidad:</label> 
        <?php
        
          if(isset($_SESSION['username']))

          { 
        
            $nombre_usuario = $_SESSION['username'];
            $Select_uni = // consultar departamentos registrados y ponerlos en una lista tipo select
            $query_dptos = "SELECT id_universidad, nombre_universidad FROM Universidad ORDER BY nombre_universidad ASC";

            $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

            echo "<select name = 'id_universidad' required/>";
            echo "<option value = '0'>Selecione una universidad </option>";
            while($row = mysqli_fetch_array($consulta_dptos))
            {
                    echo '<option value = "'.$row['id_universidad'].'">'.$row['nombre_universidad'].'</option>';
            }
            echo "</select>";
         }
        ?>
        


        <br><br>
        <button type="submit">Registrar</button>
        <button onclick="history.back()">Volver</button>
    </form>
</body>
</html>