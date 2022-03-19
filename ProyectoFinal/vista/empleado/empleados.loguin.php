<?php require_once 'vista/templates/encabezado.php'; ?>
<div class="container"></div>
<h1>Loguin de Administrador</h1>
        <form action="index.php?c=empleados&f=loguin" method="POST"> 
                <label>Cedula</label>
                <input type="text" name="cedula">
                <label>contrasena</label>
                <input type="password" name="Pass">
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    <a href="index.php?c=home&a=index" class="btn btn-primary">Cancelar</a>
                </div>
        </form>
    
<?php require_once 'vista/templates/piedepagina.php'; ?>