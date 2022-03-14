<!DOCTYPE html>

<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Presentacion de datos</title>
    <link rel="stylesheet" href="assets_MF/css/style.css">
    <link rel="stylesheet" href="Assets/css/Style.css">
</head>
<style>
    .fondo1{
        background: white;
        
    }
    table {
    border: #b2b2b2 1px solid;
    
    }
    td, th {
    border: #b2b2b2 1px solid;
    }
</style>
<body>
    <?php
        include_once '.../menu.php';
     ?>         
    <p></p>
    <div class="fondo1">
        <div class="cabecera">
            <h2>Presentacion de Datos</h2>
         </div>
         
     <div>
          
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
         
    <?php
    
                require_once '.../conexion.php';
                    $sql = "select * from reservar";
                    $resultado = mysqli_query($con, $sql);
        
        
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['Id'] ?></td>
                            <td><?php echo $fila['Nombres'] ?></td>
                            <td><?php echo $fila['Apellidos'] ?></td>
                            <td><?php echo $fila['Email'] ?></td>
                            <td><?php echo $fila['Fecha']?></td>
                                             
                            <td>
                                <a href="Editar.php?id=<?php echo $fila['Id']?>">Editar</a> 
                               
                                <a href="Eliminar.php?id=<?php echo $fila['Id'] ?>">Eliminar</a>
                               
                             <?php  //echo  "<a href='eliminar.php?id=".$fila['id']."'>Editar</a>";
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
     </tbody>
            </table>
     </div>
         <input class="botones" href="Form.php" type="submit" value="Registrar">  
     </div>
  

    <p></p>
    
     <?php
        include_once 'footer.php';
     ?>  
    

</body>
</html>


