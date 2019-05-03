<br><h1>ADMINISTRACIÓN DE CATEGORÍAS</h1><br>

<h4>EDICIÓN DE CATEGORÍAS EXISTENTES</h4><br>

<table class="table table-striped">
    <thead>
        <tr>
            
            <th>Categoría</th>
            <th>Editar categoría</th>
            <th>Eliminar categoría</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach($this->categorias->ListarTipoCategorias() as $r):
            if ($r->id_categoria <> 4) { ?>
            <tr>
               
                <td><?php echo $r->descripcion_categoria; ?></td>
                <td>
                    <a href="?c=Web&a=Editar_descripcion_Categoria&id_categoria=<?php echo $r->id_categoria; ?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Seguro que desea eliminar la categoría <?php echo $r->descripcion_categoria; ?>?');" href="?c=Web&a=Eliminar_Categoria&id_categoria=<?php echo $r->id_categoria; ?>">Eliminar</a>
                </td>
            </tr>

            <?php     
            };    
        endforeach; 
        ?>

    </tbody>
</table>
<br>
<hr>
<br>

<br><h4>AÑADIR NUEVA CATEGORÍA</h4><br>

<div class="row justify-content-center" >
<form id="frm-categoria" action="?c=Web&a=Insertar_Categoria" method="post" enctype="multipart/form-data" >

    <div class="form-group">    
    <label>Descripción de la categoría</label>
        <input type="text" name="descripcion_categoria" value="<?php echo $newcat->descripcion_categoria; ?>" class="form-control" placeholder="Nombre de la categoría" style="text-align: center" />
    </div>

    <div class="text-center">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
</div><br>