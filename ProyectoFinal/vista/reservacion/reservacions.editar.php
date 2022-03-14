<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/encabezado.php'; ?>
?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=editar" method="POST" name="formProdNuevo" id="formProdNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['prod_id']; ?>"/>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text"  name="codigo" id="codigo" value="<?php echo $prod['prod_codigo']; ?>" class="form-control" placeholder="codigo del producto" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $prod['prod_nombre']; ?>" class="form-control" placeholder="nombre producto" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control">
                       <?php
                       foreach ($categorias as $cat) {
                           $selected='';
                           if($cat->cat_id == $prod['prod_idCategoria']){
                                 $selected='selected="selected"';
                           }
                           echo  "<option ".$selected." value='".$cat->cat_id."'>".$cat->cat_nombre."</option>";
                       }
                        ?>
                      
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" id="precio" value="<?php echo $prod['prod_precio']; ?>" class="form-control" placeholder="precio producto" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion"  name="descripcion"  class="form-control" rows="2"><?php echo $prod['prod_descripcion']; ?>
                    </textarea>
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" value="<?php echo $prod['prod_estado']?>" 
                           name="estado" <?php echo ($prod['prod_estado'] == 1)?'checked="checked"':''; ?>>
                    
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el productos')) return false;" >Guardar</button>
                    <a href="index.php?c=productos&a=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
