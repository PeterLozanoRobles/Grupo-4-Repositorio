<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=nuevo" method="POST" >
            <div class="form-row">
                
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="Nombre" id="nombre" class="form-control" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="Categoria" class="form-control">
                        <?php foreach ($categorias as $cat) {?>
                        <option value="<?php echo $cat->Id_categoria ?>">
                             <?php echo $cat->Nombre; ?></option>
                            <?php } ?>   

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">Precio</label>
                    <input type="text" name="Precio" id="precio" class="form-control" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion"  name="Descripcion" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" name="Estado" value="1" >
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=productos&a=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
