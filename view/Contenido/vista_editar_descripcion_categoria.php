<h1>EDITAR DESCRIPCIÓN DE LA CATEGORÍA</h1>
<h2>Categoria: <?php echo $catsel->descripcion_categoria; ?> </h2>


<form id="mod_categoria" action="?c=Web&a=Actualizar_Categoria" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Introduce una nueva descripción para la categoría</label>
        <input type="text" name="descripcion_categoria" value="<?php echo $catsel->descripcion_categoria; ?>" class="form-control" placeholder="Edita la descripción de la categoría"/>
        </div>

        <div class="form-group">

        <input type="hidden" type="text" name="id_categoria" value="<?php echo $catsel->id_categoria; ?>" class="form-control" placeholder="id"/>
        </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
