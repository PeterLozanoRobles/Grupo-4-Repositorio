<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>
?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=sucursal&f=editar" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['IdSucursal']; ?>"/>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">Provincia</label>
                    <input type="text"  name="Provincia"class="form-control" value="<?php echo $prod['Provincia']; ?>" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Ciudad</label>
                    <input type="text" name="Ciudad" class="form-control" value="<?php echo $prod['Ciudad']; ?>" required>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="nombre">Sector</label>
                    <select name="Sector" value="<?php echo $prod['Sector']; ?>" style="padding-left: 150px; padding-right: 150px; border-radius: 5px;">
                        <option value="Norte">Norte</option>
                        <option value="Este">Este</option>
                         <option value="Oeste">Oeste</option>
                         <option value="Sur">Sur</option>
                         <option value="Centro">Centro</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="Direccion">Direccion</label>
                    <textarea name="Direccion" class="form-control" value="<?php echo $prod['Direccion']; ?>"></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">Personal</label>
                    <input type="number" name="Personal" class="form-control" min="1"  value="<?php echo $prod['Personal']; ?>" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">telefono</label>
                    <input  name="telefono" class="form-control" value="<?php echo $prod['telefono']; ?>">
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" name="Estado" value="<?php echo $prod['Estado']; ?>"
                    <?php echo ($prod['Estado'] == 'A')?'checked="checked"':''; ?>>
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=sucursal&a=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
