<h1>ADMINISTRACION</h1><br><hr>

<h4>LISTA DE USUARIOS</h4>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id_nivel</th>
            <th>Nombre de usuario</th>
            <th>Editar usuario</th>
            <th>Eliminar usuario</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->usuario->Listar_usuarios() as $r): ?>
        <tr>
            <td><?php echo $r->id_nivel; ?></td>
            <td><?php echo $r->nombre_usuario; ?></td>
            <td>
                <a href="?c=Web&a=Editar_Usuario&id_usuario=<?php echo $r->id_usuario; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar_Usuario&id_usuario=<?php echo $r->id_usuario; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

