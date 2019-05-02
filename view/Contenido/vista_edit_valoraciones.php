<h1>ADMINISTRACION</h1><br><hr>

<h4>GESTIÓN DE COMENTARIOS</h4>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Producto</th>
            <th>Comentario</th>
            <th>Editar comentario</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->valoraciones->ListarValoraciones() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_usuario; ?></td>
            <td><?php echo $r->nombre_producto; ?></td>
            <td><?php echo $r->valoracion_producto; ?></td>
            <td>
                <a href="?c=Web&a=edit_Coment&id_usuario=<?php echo $r->id_usuario; ?>&id_producto=<?php echo $r->id_producto; ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>