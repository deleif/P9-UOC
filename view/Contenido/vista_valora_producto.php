<LINK REL=StyleSheet HREF="assets/css/estilo_estrellas.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="assets/css/estilo_comentarios.css" TYPE="text/css" MEDIA=screen>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


<div class="row">

  <div class=".col-lg-auto col-centrada "  >
  <br>
  <div class="card bg-light" style="width: 18rem;">  
  <div class="card-body">

  <h5 class="card-title"><?php echo $prodsel->nombre_producto; ?></h5>
  <h6 class="card-subtitle mb-2 text-muted"><?php echo $prodsel->id_categoria; ?></h6>

      
    <table class="table  ">
    <tbody>    

        <tr>
            <td><?php echo $prodsel->descripcion_producto; ?></td>		
        </tr>
        <tr>
            <td><img src="<?php echo $prodsel->ruta_foto;?>" alt="" /></td>
        </tr>
        <td>
        <small>Valora este producto (1-5)</small>
                <!--<a href="?c=Web&a=ValorarProducto&id=<?php //echo $r->id_producto; ?>">Valorar</a>-->
                <div id="wrapper">
                    <form id="frm-valoracion" action="?c=Web&a=Votar&id_producto=<?php echo $prodsel->id_producto; ?>" method="post" enctype="multipart/form-data">
                        <p class="clasificacion">
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
                        </p>
                        <small>Comenta este producto</small>
                        <input type="text" name="valoracion_escrita">
                        <br></br>

                        <div class="text-right">
                            <button class="btn btn-success">Valorar</button>
                        </div>
                        
                    </form>
                </div>
            </td>
            </tr>
  
        </tbody>
    </table>
    </div> 
    </div> 
</div> 
</div>  
<br><br>

            <?php
            function stars($rating){
                for($i = 0; $i < 5; $i++){
                    if($i < $rating){
                        echo "<i class='fa fa-star glow'></i>";
                    } else {
                        echo "<i class='fa fa-star gris'></i>";
                    }
                }
            }            
            
            ?>


<div class="row">
  <div class=".col-lg-auto col-centrada "  >
<div class="bg-secondary">
<br>
<h4 class="text-white">&nbsp; Opiniones de nuestros usuarios &nbsp;</h4>
<br>
</div>

<?php foreach($this->valoraciones->buscar_valoracion_por_producto($prodsel->id_producto) as $r): ?>
<div class="table-responsive">
<table class="table comentarios table-borderless ">   
    <tbody>
    
        <tr>
        <td><img src="assets/images/avatar.jpeg"></td>         
        </tr>
        <tr>
        <td><?php echo $r->nombre_usuario; ?></td>
        </tr>
        <tr>
        <td><?php echo $r->valoracion_producto;; ?></td>
        </tr>
        <tr>
        <td><small>Puntuación del usuario: </smal> <?php stars($r->puntos_producto_usuario); ?></td>	
        </tr>

        <tr>
            <br>
            <br>
            <hr>
        </tr>
        
    </tbody>
    
</table>
</div>



<?php endforeach; ?>
</div>
</div>



