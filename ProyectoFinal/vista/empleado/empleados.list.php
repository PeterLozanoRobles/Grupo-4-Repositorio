
<?php require_once 'vista/templates/encabezado.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=empleados&f=buscar" method="POST">
                <input type="text" name="busqueda" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=empleados&f=nuevo"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</button>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <th>ID</th>
            <th>CEDULA </th>
            <th>NOMBRE </th>
            <th>APELLIDOS </th>
            <th>FECHA DE NACIMIENTO </th>
            <th>SEXO</th>
            <th>CARGO </th>
            <th>SUELDO </th>
            <th>USUARIO </th>
            <th>CONTRASEÑA </th>
            <th>PIN </th>
            <th>ESTADO </th>
            <th>ACCIONES </th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['IdPersonal']; ?></td>
                        <td><?php echo $fila['Cedula']; ?></td>
                         <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['Apellidos']; ?></td>
                        <td><?php echo $fila['Fecha_Nacimiento']; ?></td>
                         <td><?php echo $fila['Sexo']; ?></td>
                        <td><?php echo $fila['Cargo']; ?></td>
                        <td><?php echo $fila['Sueldo']; ?></td>
                        <td><?php echo $fila['Usuario']; ?></td>
                        <td><?php echo $fila['Contrasena']; ?></td>
                        <td><?php echo $fila['Pin']; ?></td>
                         <td><?php echo $fila['Estado']; ?></td>
                        <td><a class="btn btn-primary" href="index.php?c=empleados&f=editar&id=<?php echo $fila['IdPersonal']; ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el cliente?'))
                                        return false;"  href="index.php?c=empleados&f=eliminar&id=<?php echo $fila['IdPersonal']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'vista/templates/piedepagina.php'; ?>