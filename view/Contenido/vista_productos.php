<h1 class="page-header">Productos</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Categoria</th>
			<th>Producto</th>
            <th>Descripcion</th>
            <th style="width:120px;">Imagen</th>
            <th style="width:120px;">Número de votos</th>
			<th style="width:120px;">Puntuación total</th>
			<th style="width:120px;">Puntuación media</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($this->productos->ListarProductos() as $r): ?>
        <tr>
            <td><?php echo $r->id_categoria; ?></td>
            <td><?php echo $r->nombre_producto; ?></td>
            <td><?php echo $r->descripcion_producto; ?></td>		
            <td><img src="<?php echo $r->ruta_foto;?>" alt="" /></td>
			<td><?php echo $r->num_votos; ?></td>
			<td><?php echo $r->puntos_total; ?></td>
			<td><?php echo $r->puntos_media; ?></td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro que desea valorar este producto?');" href="?c=Productos&a=valorar&id=<?php echo $r->id; ?>">Valorar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 







