
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">  
            <form action="index.php?c=sucursal&f=buscar" method="POST">
                 <label for="nombre">Sector</label>
                    <select name="busqueda" id="busqueda" style="padding-left: 150px; padding-right: 150px; border-radius: 5px;">
                        <option value="Norte">Norte</option>
                        <option value="Este">Este</option>
                         <option value="Oeste">Oeste</option>
                         <option value="Sur">Sur</option>
                         <option value="Centro">Centro</option>
                    </select><br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=sucursal&a=index"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Todo </button>
            </a><br>
            <a href="index.php?c=sucursal&f=nuevo"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</button>
            </a>
        </div>
        
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>CODIGO</th>
            <th>ESTADO </th>
            <th>PROVINCIA </th>
            <th>CUIDAD </th>
            <th>SECTOR </th>
            <th>DIRECCION </th>
            <th>PERSONAL </th>
            <th>TELEFONO </th>
            <th>Acciones </th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['IdSucursal']; ?></td>
                        <td><?php echo $fila['Estado']; ?></td>
                         <td><?php echo $fila['Provincia']; ?></td>
                        <td><?php echo $fila['Ciudad']; ?></td>
                        <td><?php echo $fila['Sector']; ?></td>
                        <td><?php echo $fila['Direccion']; ?></td>
                        <td><?php echo $fila['Personal']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><a class="btn btn-primary" href="index.php?c=sucursal&f=editar&id=<?php echo $fila['IdSucursal']; ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el producto?'))
                                        return false;"  href="index.php?c=sucursal&f=eliminar&id=<?php echo $fila['IdSucursal']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'vista/templates/piedepagina.php'; ?>