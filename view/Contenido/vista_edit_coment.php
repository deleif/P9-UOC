<br><h1>EDITAR COMENTARIO</h1><br>

<div class="row justify-content-center" >
<form action="?c=Web&a=Actualizar_Comentario" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $val->id_usuario; ?>" />
    <input type="hidden" name="id_producto" value="<?php echo $val->id_producto; ?>" />

    <div class="form-group">
        <label>Comentario</label>
        <textarea rows="4" cols="50" name="valoracion_producto" value="<?php echo $val->valoracion_producto; ?>" class="form-control" placeholder="Edita el comentario" style="text-align: center"><?php echo $val->valoracion_producto; ?></textarea>

    </div>
    <hr />
    <div class="text-center">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
</div><br>
