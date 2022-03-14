<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_LM//css/Style_LM_form.css">
        <link rel="stylesheet" href="Assets/css/Style.css">
        <title>Buscar</title>
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
     
     <BR><BR>
        <div>
            <form method="post" action="buscar_AH.php">

                <div>
                    <label>NOMBRE:</label>
                    <input type="text" name="txtNombre">
                </div><br>

                <div class="button">
                    <input id="buton" type="submit" value="Buscar" name="btnBuscar">
                </div>

                <!--<input type="submit" value="Agregar">
                <input type="reset" value="Cancelar">-->
                <!--<input type="button" value="Buscar">-->

            </form>
        </div>

        <?php 
        // incluir archivo conexion.php
        require_once 'conexion.php';
       

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
                    $sql = "SELECT * FROM Servicio ";
                    if(isset($_REQUEST["btnBuscar"])){
                        $txtNombre = $_REQUEST["txtNombre"];
                        $sql = "SELECT * FROM Servicio WHERE nombre = '$txtNombre'";

                    }else{if(isset($_REQUEST["btnTodos"])){
                        $sql = "SELECT * FROM Servicio ";
                    }
                    }

                    $resultado= mysqli_query($con, $sql);
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
            
        </div>

        <?php
        include_once 'footer.php';
        ?>
        
    </body>
</html>
