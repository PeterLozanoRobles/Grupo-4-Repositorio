
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=clientes&f=buscar" method="POST">
                <input type="text" name="busqueda" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=clientes&f=nuevo"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</button>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>ID</th>
            <th>NOMBRE </th>
            <th>PASSWORD </th>
            <th>EMAIL </th>
            <th>SEXO </th>
            <th>TELEFONO </th>
            <th>TERMINO </th>
            <th>ACCIONES </th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['IdUsuario']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                         <td><?php echo $fila['Password']; ?></td>
                        <td><?php echo $fila['Email']; ?></td>
                        <td><?php echo $fila['Sexo']; ?></td>
                        <td><?php echo $fila['Telefono']; ?></td>
                        <td><?php echo $fila['Termino']; ?></td>
                        <td><a class="btn btn-primary" href="index.php?c=clientes&f=editar&id=<?php echo $fila['IdUsuario']; ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el cliente?'))
                                        return false;"  href="index.php?c=clientes&f=eliminar&id=<?php echo $fila['IdUsuario']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'vista/templates/piedepagina.php'; ?>