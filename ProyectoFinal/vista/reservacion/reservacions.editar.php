<!-- incluimos  Encabezado -->
//reservar    Comentario, Fecha, Hora (time),IDCliente (int),IdReserva (PRI, int),IdServicio (int)

<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=productos&f=editar" method="POST" name="formProdNuevo" id="formProdNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $prod['prod_id']; ?>"/>
            <div class="form-row">
               <div class="form-group col-sm-6">
                    <label >Servicio</label>
                    <select id="categoria" name="IdServicio" class="form-control" value="<?php echo $prod['prod_id']; ?>">
                        <?php foreach ($categorias as $cat) {
                            ?>
                        <option value="<?php echo $cat->cat_id ?>">
                            <?php echo $cat->cat_nombre; ?></option>
                            <?php  } ?>   
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label>Fecha</label>
                    <input type="datetime" name="Fecha" class="form-control" value="<?php echo $prod['prod_id']; ?>">
                </div>          
                               
                <div class="form-group col-sm-6">
                    <label >Hora</label>
                    <select id="categoria" name="Hora" class="form-control" value="<?php echo $prod['prod_id']; ?>">
                        <option value="08:00:00"> 8H00</option>  
                        <option value="10:00:00"> 10H00</option>  
                        <option value="12:00:00"> 12H00</option>  
                        <option value="14:00:00"> 14H00</option>  
                        <option value="16:00:00"> 16H00</option>  
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="descripcion">Comentario</label>
                    <textarea id="descripcion"  name="Comentario" class="form-control" rows="3" value="<?php echo $prod['prod_id']; ?>"></textarea>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=reservacions&a=index" class="btn btn-primary">Cancelar</a>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el la reservacion')) return false;" >Guardar</button>
                    <a href="index.php?c=reservacions&a=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/piedepagina.php'; ?>
