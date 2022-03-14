<!DOCTYPE html>



<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets_CG/css/style.css"/>
        <title>Document</title>
    </head>
    <body>

        <?php
           include_once 'menu.php';
           ?>
           <?php
        // incluir archivo conexion.php
        require_once 'conexion.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from sucursal where id = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
        <section class="registro-sucursales">
             <div>
            <h4> ✽ Eliminar ฅ^-ﻌ-^ฅ ✽</h4>
            </div>
                    <form method="post">
                        <div>
                        <label>Id:</label><input class="caja" type="text" name="txtid" readonly 
                                               value="<?php echo $fila['id'] ?>" readonly> <br>
                         </div><br>
                        
                        <div>
                       <label>Nombre:</label><input class="caja" type="text" name="txtnombre" 
                                                     value="<?php echo $fila['nombre'] ?>" readonly><br>
                        </div><br>
                        
                   
                     
                       
                       <input class="boton" type="submit" value="Eliminar">
                       
                       
                    </form>
        </section>
                
            <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['txtid']) && !empty($_POST['txtid'])) {
            $id = htmlentities($_POST['txtid']);

            $sql = "delete from sucursal where id = $id ";

          if(mysqli_query($con, $sql)){
                 header("location:presentar_CG.php");
              
          }else{
              
              
          }

         
        }
        ?>
       
       <?php
        include_once 'footer.php';
        ?>
        

    </body>
</html>