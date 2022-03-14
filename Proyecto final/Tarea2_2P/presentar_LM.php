<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_LM//css/Style_LM_form.css">
        <link rel="stylesheet" href="Assets/css/Style.css">
        <title>Prs</title>
        <style>table {
                border: #b2b2b2 1px solid;
            }
            td, th {
                border: #b2b2b2 1px solid;
            }
            </style>
    </head>
    <body>

        <?php
        include_once 'menu.php';
        ?> 

         <h1> Nosotros</h1>
  
        <?php 
        // incluir archivo conexion.php
        require_once 'conexion.php';
       
        $sql = "select * from Nosotros";
        $resultado = mysqli_query($con, $sql);
        ?>

        <div>
          
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>SEXO</th>
                        <th>FORMACION ACADEMIC</th>
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
                            <td><?php echo $fila['sexo'] ?></td>
                            <td><?php echo $fila['formacionAcademica'] ?></td>

                            <td>
                                <a href="editar_LM.php?id=<?php echo $fila['id'] ?>">Editar</a>
                               
                                <a href="eliminar_LM.php?id=<?php echo $fila['id'] ?>">Eliminar</a>
                               
                             <?php  //echo  "<a href='eliminar.php?id=".$fila['id']."'>Editar</a>";
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar_LM.php">Agregar</a>
            <a href="buscar_LM.php">Buscar</a>
        </div>

        <?php
        include_once 'footer.php';
        ?>  

    </body>
</html>