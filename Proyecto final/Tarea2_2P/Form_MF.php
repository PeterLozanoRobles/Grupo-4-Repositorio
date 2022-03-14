<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Validaci�n de formularios</title>
        <link rel="stylesheet" href="assets_MF/css/style.css">
        <link rel="stylesheet" href="Assets/css/Style.css">
    </head>
<body>
    <?php
        include_once 'menu.php';
     ?>   
    <p></p>
     <div class="contenedor">
        <div class="cabecera">
            <h2>Crear Cuenta</h2>
        </div>
         <form id="formulario" method="post">

            <div class="form-control">
                <label for="uario">Nombre de usuario</label>
                <input id="usuario" name="usuario" type="text">
                <p></p>                
            </div>

            <div class="form-control">
                <label for="eail">E-mail</label>
                <input id="email" type="email" name="email">
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
                <input id="pass" type="password" name="pass">
                <p></p>                
            </div>

            <div class="form-control">
                <label for="passCo">Confirmar Password</label>
                <input id="passConfirma" type="password" name="passConfirma">
                <p></p>                
            </div>
            
            <div class="form-control">
                <input type="checkbox" id="termino" value="1" name="termino"> 
                <label for="termino" >Acepto termino y condiciones</label>
                <p></p>
            </div>
            <p></p>
            <button type="submit" value="Enviar" name='btnEnviar' >Enviar</button>  
             
        </form>
    </div>
    
     <?php
      
        // incluir archivo conexion.php
        require_once 'conexion.php';


        if (!empty($_POST['usuario']) && !empty($_POST['email']) &&
                !empty($_POST['sexo']) && !empty($_POST['pass']) 
                && !empty($_POST['passConfirma']) && !empty($_POST['termino'])) {
            
            // variables
            $Usuario=htmlentities($_POST["usuario"]);
            $email=isset($_POST["email"]) ? htmlentities($_POST["email"]) : '';
            $pass=htmlentities($_POST["pass"]);
            $passConfirma=htmlentities($_POST["passConfirma"]);
            $termino=htmlentities($_POST["termino"]);
            
            if (isset($_POST["sexo"])) {
                if (htmlspecialchars($_POST["sexo"]) === "1") {
                $sexo = "F";
                } else {
                    $sexo = "M";
                }
            }
            
            if (isset($_POST["termino"])){
                if (htmlentities($_POST["termino"]) === "1") {
                $termino = "S";
                } else {
                    $termino = "N";
                }
            }

            $sql = "insert into usuario(Nombre, Email, Sexo, Password, Confpassword, Termino) "
                    . "values('$Usuario','$email','$sexo','$pass','$passConfirma','$termino' )";

            if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:Presentar_MF.php"); //redireccionar
            } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
            }
    }
    ?>

<?php
        include_once 'footer.php';
     ?>      
</body>
</html>  