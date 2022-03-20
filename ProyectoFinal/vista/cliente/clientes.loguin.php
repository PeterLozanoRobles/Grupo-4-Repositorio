<?php require_once 'vista/templates/encabezado.php'; ?>
<div class="container">
    
<h1>Loguin de Cliente</h1>
        <form action="index.php?c=clientes&f=loguin" method="POST"> 
                <label>Nombre</label>
                <input type="text" name="Nombre">
                <label>contrasena</label>
                <input type="password" name="Pass">
                
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                    <a href="index.php?c=clientes&a=index" class="btn btn-primary">Cancelar</a>
                </div>
        </form>
<form action="index.php?c=empleados&f=loguin" method="POST">
                <button type="submit" class="btn btn-primary">Administrador</button>
</form> 
</div>
<?php require_once 'vista/templates/piedepagina.php'; ?>