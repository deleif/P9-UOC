<br><h1>EDITAR PRODUCTO</h1><br>
<h2><?php echo $prod->nombre_producto; ?></h2><br>

<div class="row justify-content-center">
<form action="?c=Web&a=Actualizar_producto" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_producto" value="<?php echo $prod->id_producto; ?>" />    
    
    <div class="form-group">
        <label>Categoría</label>
        <select name="id_categoria" value="<?php echo $prod->id_categoria; ?>" class="form-control" placeholder="Ingrese su categoría">
            <?php foreach($this->categorias->ListarTipoCategorias() as $r): ?>
                <option value=<?php echo $r->id_categoria; ?>><?php echo $r->descripcion_categoria; ?></option> 
            <?php endforeach; ?> 
            </select>    
    </div>

    <div class="form-group">
        <label>Nombre del producto</label>
        <input type="text" name="nombre_producto" value="<?php echo $prod->nombre_producto; ?>" class="form-control" placeholder="Ingrese el nombre del producto" data-validacion-tipo="requerido|min:3" style="text-align: center"/>
    </div>

    <div class="form-group">
        <label>Descripcion del producto</label>
        <textarea rows="4" cols="50" name="descripcion_producto" value="<?php echo $prod->descripcion_producto; ?>" class="form-control" placeholder="Descripción del producto" data-validacion-tipo="requerido|min:3" style="text-align: center"><?php echo $prod->descripcion_producto; ?></textarea>
    </div>

    <div class="form-group">
    <label>Imagen</label><br>    
        <img src="<?php echo $prod->ruta_foto; ?>">
        <input type="file" id = "ruta_foto" name="ruta_foto" accept="image/png, image/jpeg" value="<?php echo $prod->ruta_foto; ?>" class="form-control" />
    </div>

    <hr/>
        
    <div class="form-group">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>
</div><br>