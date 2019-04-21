

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


        <tr>
            <td><?php echo $prodsel->id_categoria; ?></td>
            <td><?php echo $prodsel->nombre_producto; ?></td>
            <td><?php echo $prodsel->descripcion_producto; ?></td>		
            <td><img src="<?php echo $prodsel->ruta_foto;?>" alt="" /></td>
			<td><?php echo $prodsel->num_votos; ?></td>
			<td><?php echo $prodsel->puntos_total; ?></td>
			<td><?php echo $prodsel->puntos_media; ?></td>
            <td>
                <a href="?c=Web&a=ValorarProducto&id=<?php echo $r->id_producto; ?>">Valorar</a>
            </td>
        </tr>

    </tbody>
</table> 
