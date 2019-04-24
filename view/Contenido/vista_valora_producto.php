
<LINK REL=StyleSheet HREF="assets/css/estilo_estrellas.css" TYPE="text/css" MEDIA=screen>
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
                <!--<a href="?c=Web&a=ValorarProducto&id=<?php //echo $r->id_producto; ?>">Valorar</a>-->
                <form id="frm-valoracion" action="?c=Web&a=Votar&id_producto=<?php echo $prodsel->id_producto; ?>" method="post" enctype="multipart/form-data">
                <input id="radio1" type="radio" name="estrellas" value="5"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                --><label for="radio5">★</label>
                
                <input type="text" name="valoracion_escrita">
                <br></br>

                <div class="text-right">
                    <button class="btn btn-success">Valorar</button>
                </div>
            
            </td>
        </tr>

    </tbody>
</table> 



<h3>Todas las valoraciones</h3>

<div class="row">
<?php foreach($this->valoraciones->Buscar_Lista_Votaciones() as $r): ?>

  <div class=".col-lg-auto col-centrada"  >
  <br>
  <div class="card" style="width: 18rem;">  
  <div class="card-body">
    <table class="table-success">
    <tbody>    

    <tr>
                <td><b><?php echo $r->nombre_producto; ?></b></td>		
            </tr>
            <tr>
                <td><img src="<?php echo $r->ruta_foto;?>" alt="" /></td>
            </tr>
            <tr>
                <td><b>Nombre usuario:</b> <?php echo $r->nombre_usuario; ?></td>
            </tr>
            <tr>
                <td><b>Puntuación: </b><?php echo $r->puntos_producto_usuario; ?></td>
            </tr>
            <tr>
                <td><b>Comentario:</b> <?php echo $r->valoracion_producto; ?></td>
            </tr>
            <tr>
                <td><b>Valoración media de nuestros usuarios:</b> <?php echo $r->puntos_media; ?></td>
            </tr>   
        </tbody>
    </table>
    </div> 
    </div> 
</div> 
<?php endforeach; ?>
</div>  






