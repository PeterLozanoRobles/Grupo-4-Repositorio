<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_AH/css/style.css">
        <link rel="stylesheet" href="Assets/css/Style.css">
        <title>Prs</title>
        <style>table {
                border: #b2b2b2 1px solid;
            }
            td, th {
                border: #b2b2b2 1px solid;
            }</style>
    </head>
    <body>

    <?php
        include_once 'menu.php';
     ?>  

         <h1>Servicios Prestados</h1>
        
        <?php  
        
        // incluir archivo conexion.php
        require_once 'conexion.php';
       
        $sql = "select * from Servicio";
        $resultado = mysqli_query($con, $sql);
        ?>

        <div>
          
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>CIUDAD</th>
                        <th>TIPO ARREGLO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['correo'] ?></td>
                            <td><?php echo $fila['ciudad'] ?></td>
                            <td><?php echo $fila['tipoArreglo'] ?></td>

                            <td>
                                <a href="editar_AH.php?id=<?php echo $fila['id'] ?>">Editar</a>
                               
                                <a href="eliminar_AH.php?id=<?php echo $fila['id'] ?>">Eliminar</a>
                               
                             <?php  //echo  "<a href='eliminar.php?id=".$fila['id']."'>Editar</a>";
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar_AH.php">Agregar</a>
            <a href="buscar_AH.php">Buscar</a>
        </div>

        <?php
        include_once 'footer.php';
        ?>  

    </body>
</html>