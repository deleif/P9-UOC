<h1>ADMINISTRACION</h1><br><hr>

<h4>NUEVA CERVEZA</h4>

<form id="frm-noticia" action="?c=Web&a=Nuevo_Producto" method="post" enctype="multipart/form-data" >
    
<div class="form-group">
        <label>Categoría cerveza</label>
            <select name="id_categoria" value="<?php echo $prod->id_categoria; ?>" class="form-control" placeholder="Seleccione una categoría">
                <option value=""></option> 
                <option value="1">Pale Lager</option>
                <option value="2">Pilsner</option>
                <option value="3">Pale Ale</option>
            </select>
    </div>    
    
    <div class="form-group">    
    <label>Nombre del producto</label>
        <input type="text" name="nombre_producto" value="<?php echo $prod->nombre_producto; ?>" class="form-control" placeholder="Introduce el nombre del producto"  />
    </div>

    <div class="form-group">
    <label>Descripción del producto</label>
        <input type="text" name="descripcion_producto" value="<?php echo $prod->descripcion_producto; ?>" class="form-control" placeholder="Introduce la descripción del producto"  />
    </div>

    <div class="form-group">
    <label>Imagen (Opcional)</label>
        <input type="file" id = "ruta_foto" name="ruta_foto" accept="image/png, image/jpeg" value="<?php echo $prod->ruta_foto; ?>" class="form-control" />
    </div>

    <div class="text-center">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
