<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets_CG/css/style.css"/>
        <title>CRUD</title>
        
    </head>
    <body>
         
        <?php
        include_once 'menu.php';
        
      
        
        // incluir archivo conexion.php
        require_once 'conexion.php';
        // require    
        //include
        //include_once
       
        
        $sql = "select * from sucursal";
        $resultado = mysqli_query($con, $sql);
        ?>
       <h4> ✽ Reservas ฅ^-ﻌ-^ฅ </h4>
        
        <div>
          
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>TELEFONO</th>
                        <th>SUCURSAL</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['apellido'] ?></td>
                            <td><?php echo $fila['telefono'] ?></td>
                            <td><?php echo $fila['sucursal'] ?></td>
                            <td><?php echo $fila['fecha'] ?></td>
                            <td><?php echo $fila['hora']?></td>
                            <td>
                                <a href="editar_CG.php?id=<?php echo $fila['id'] ?>">Editar</a>
                               
                                <a href="eliminar_CG.php?id=<?php echo $fila['id'] ?>">Eliminar</a>
                               
                             <?php  //echo  "<a href='eliminar.php?id=".$fila['id']."'>Editar</a>";
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar_CG.php">Agregar</a>
        </div>
<p></p>

        
        <?php
        include_once 'footer.php';
        ?>
     
    </body>
</html>