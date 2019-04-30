<h1>EDITAR COMENTARIO</h1>
<h2>ID Usuario: <?php echo $val->id_usuario; ?> / ID Producto: <?php echo $val->id_producto; ?></h2>


<form action="?c=Web&a=Actualizar_Comentario" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $val->id_usuario; ?>" />
    <input type="hidden" name="id_producto" value="<?php echo $val->id_producto; ?>" />

    <div class="form-group">
        <label>Comentario</label>
        <input type="text" name="valoracion_producto" value="<?php echo $val->valoracion_producto; ?>" class="form-control" placeholder="Edita el comentario"/>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
