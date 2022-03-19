<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=sucursal&f=nuevo" method="POST">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">Provincia</label>
                    <input type="text"  name="Provincia"class="form-control" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Ciudad</label>
                    <input type="text" name="Ciudad" class="form-control" required>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="nombre">Sector</label>
                    <select name="Sector" style="padding-top: 5px; padding-bottom: 5px; padding-left: 225px; padding-right: 225px; border-radius: 5px;">
                        <option value="Norte">Norte</option>
                        <option value="Este">Este</option>
                         <option value="Oeste">Oeste</option>
                         <option value="Sur">Sur</option>
                         <option value="Centro">Centro</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="Direccion">Direccion</label>
                    <textarea id="categoria" name="Direccion" class="form-control"></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">Personal</label>
                    <input type="number" name="Personal" class="form-control" min="1" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">telefono</label>
                    <input  name="telefono" class="form-control">
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" name="Estado" value="1">
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
