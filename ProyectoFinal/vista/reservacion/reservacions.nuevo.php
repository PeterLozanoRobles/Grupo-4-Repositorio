<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=nuevo" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text"  name="codigo" id="codigo" class="form-control" placeholder="codigo del producto" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre producto" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php foreach ($categorias as $cat) {
                            ?>
                        <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_nombre; ?></option>
                            <?php
                        }
                        ?>   

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" id="precio" class="form-control" placeholder="precio producto" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion"  name="descripcion" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" name="estado" >
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=producto&a=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
