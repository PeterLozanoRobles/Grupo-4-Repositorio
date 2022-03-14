<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminacion de usuario</title>
    </head>
    <body>   
        <?php
           include_once 'menu.php';
          ?>
        <p></p>
        <div class="contenedor">
        <div class="cabecera">
        <h2>Datos Eliminado</h2>
        </div>
         <?php
        
        // incluir archivo conexion.php
        require_once 'conexion.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from usuario where IdUsuario = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
         <form id="formulario" method="post">

            <div class="form-control">
                <label for="uario">Nombre de usuario</label>
                <input name="usuario" type="text" readonly value="<?php echo $fila['Nombre'] ?>" readonly>
                <p></p>                
            </div>

            <div class="form-control">
                <label for="eail">E-mail</label>
                <input id="email" type="email" name="email" readonly value="<?php echo $fila['Email'] ?>" readonly>
                <p></p>                
            </div>
            
            <div class="form-control">
                <label for="seo">Sexo:</label>
                    <select name="sexo" id="sexo">
                        <option value="0" >Seleccione..</option>
                        <option value="1" >Femenino</option>
                        <option value="2">Masculino</option>                                   
                    </select> 
                <p></p>
            </div>
            
            <div class="form-control">
                <label for="pas">Password</label>
                <input id="pass" type="password" name="pass" readonly value="<?php echo $fila['Password'] ?>" readonly>
                <p></p>                
            </div>

            <div class="form-control">
                <label for="passCo">Confirmar Password</label>
                <input id="passConfirma" type="password" name="passConfirma" readonly value="<?php echo $fila['Confpassword'] ?>" readonly>
                <p></p>                
            </div>
            
            <div class="form-control">
                <input type="checkbox" id="termino" value="1" name="termino"> 
                <label for="termino" >Acepto termino y condiciones</label>
                <p></p>
            </div>
            <p></p>
            <button type="submit" value="Eliminar" >Eliminar</button>  
             
        </form>
    
        <?php
            }
        }
        ?>
    
        <?php
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "delete from usuario where IdUsuario = $id ";
          if(mysqli_query($con, $sql)){
                 header("location:Presentar_MF.php");            
          }else{             
          }         
        }
        ?>
         </div>
         
    <?php
        include_once 'footer.php';
     ?>  
    </body>
</html>