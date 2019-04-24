<h1>ADMINISTRACION</h1><br><hr>

<h4>GESTIÓN DE PRODUCTOS</h4>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id_producto</th>
            <th>Nombre del producto</th>
            <th>Editar usuario</th>
            <th>Eliminar usuario</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->productos->ListarProductos() as $r): ?>
        <tr>
            <td><?php echo $r->id_producto; ?></td>
            <td><?php echo $r->nombre_producto; ?></td>
            <td>
                <a href="?c=Web&a=Editar_Producto&id_producto=<?php echo $r->id_producto; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro que desea eliminar la cerveza <?php echo $r->nombre_producto; ?>?');" href="?c=Web&a=Eliminar_Producto&id_producto=<?php echo $r->id_producto; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>