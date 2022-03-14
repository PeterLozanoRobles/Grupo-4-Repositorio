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
        include_once 'menu.php';
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
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th>Password</th>
                        <th>Confpassword</th>
                        <th>Termino</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
         
    <?php
    
                require_once 'conexion.php';
                    $sql = "select * from usuario";
                    $resultado = mysqli_query($con, $sql);
        
        
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?php echo $fila['IdUsuario'] ?></td>
                            <td><?php echo $fila['Nombre'] ?></td>
                            <td><?php echo $fila['Email'] ?></td>
                            <td><?php echo $fila['Sexo'] ?></td>
                            <td><?php echo $fila['Password']?></td>
                            <td><?php echo $fila['Confpassword'] ?></td>
                            <td><?php echo $fila['Termino']?></td>
                           
                            <td>
                                <a href="editar_MF.php?id=<?php echo $fila['IdUsuario']?>">Editar</a> 
                               
                                <a href="eliminar_MF.php?id=<?php echo $fila['IdUsuario'] ?>">Eliminar</a>
                               
                             <?php  //echo  "<a href='eliminar.php?id=".$fila['id']."'>Editar</a>";
                                ?>


                            </td>
                        </tr>
                    <?php } ?>
     </tbody>
            </table>
     </div>
     </div>
   

    <p></p>
    
     <?php
        include_once 'footer.php';
     ?>  
    

</body>
</html>
