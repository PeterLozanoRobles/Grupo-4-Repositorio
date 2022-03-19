<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=clientes&f=editar" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['IdUsuario']; ?>"/>
            <div class="form-row">
               
                <div class="form-group col-sm-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['Nombre']; ?>" class="form-control" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="telefono">Telefono</label>
                    <input type="text"  name="telefono" class="form-control"  value="<?php echo $prod['Telefono']; ?>" required/>
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="seo">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-control" value="<?php echo $prod['Sexo']; ?>">
                        <option value="0" >Seleccione..</option>
                        <option value="1" >Femenino</option>
                        <option value="2">Masculino</option>                                   
                    </select> 
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $prod['Email']; ?>" required>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="password">Password</label>
                    <input type="password" name="pass" class="form-control" value="<?php echo $prod['Password']; ?>" required>
                </div>          

                <div class="form-group col-sm-6">
                    <label for="passConfirma">Confirmar Password</label>
                    <input type="password" name="passConfirma"  value="<?php echo $prod['Confpassword']; ?>" class="form-control">
                </div>
                
                <div class="form-group col-sm-12">
                    <input type="checkbox" value="1" name="termino" value="<?php echo $prod['Termino']?>" 
                        <?php echo ($prod['prod_estado'] == 'S')?'checked="checked"':''; ?> >
                    <label for="termino">Acepto termino y condiciones</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el cliente')) return false;" >Guardar</button>
                    <a href="index.php?c=clientes&a=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
