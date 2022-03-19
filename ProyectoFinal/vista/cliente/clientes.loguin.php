
<?php require_once 'vista/templates/encabezado.php'; ?>
<div class="container"></div>
    
        
        <form action="index.php?c=clientes&f=loguin" method="POST"> 
                <label>Cedula</label>
                <input type="text" name="cedula">
                <label>contrasena</label>
                <input type="password" name="Pass">
                
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=clientes&a=index" class="btn btn-primary">Cancelar</a>
                </div>
        </form>
    
<?php require_once 'vista/templates/piedepagina.php'; ?>