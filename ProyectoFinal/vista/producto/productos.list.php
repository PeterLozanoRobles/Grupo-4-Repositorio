
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=productos&f=buscar" method="POST">
                <input type="text" name="busqueda" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=productos&f=nuevo"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</button>
            </a>
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=categorias&a=index"> 
                <button type="button" class="btn btn-primary"> Categoria</button>
            </a>
        </div>
        </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>Código</th>
            <th>Nombre </th>
            <th>Descripcion </th>
            <th>Categoría </th>
            <th>Precio </th>
            <th>Estado </th>
            <th>Acciones </th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['IdProductos']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                         <td><?php echo $fila['Descripcion']; ?></td>
                        <td><?php echo $fila['categoria']; ?></td>
                        <td><?php echo $fila['Precio']; ?></td>
                         <td><?php echo $fila['Estado']; ?></td>
                        <td><a class="btn btn-primary" href="index.php?c=productos&f=editar&id=<?php echo $fila['IdProductos']; ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el producto?'))
                                        return false;"  href="index.php?c=productos&f=eliminar&id=<?php echo $fila['IdProductos']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'vista/templates/piedepagina.php'; ?>