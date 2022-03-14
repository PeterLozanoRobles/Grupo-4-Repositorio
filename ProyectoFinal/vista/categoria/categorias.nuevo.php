<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=categorias&f=nuevo" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="Nombre" id="Nombre"class="form-control" required>
                </div>     

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion"  name="Descripcion"  class="form-control" rows="2">
                    </textarea>
                </div>     
                
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" name="Estado" value="1">
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=categorias&f=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
