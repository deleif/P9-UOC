<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.expander.js"></script>
<script type="text/javascript" src="assets/js/jquery.expander.config.js"></script>

<div class="row">
<?php foreach($this->productos->ObtenerProductoCategoria($_REQUEST['id_categoria']) as $r): ?>

<div class=".col-lg-auto col-centrada"  >
  <br>
  <div class="card bg-light" style="width: 18rem;">  
  <div class="card-body">

  <h5 class="card-title"><?php echo $r->nombre_producto; ?></h5>
  <h6 class="card-subtitle mb-2 text-muted"><?php echo $r->descripcion_categoria; ?></h6>

    
    <table class="table  ">
    <tbody>    

        <tr>
            <td>
                <div class="expandDiv">
                <?php echo $r->descripcion_producto; ?>
                </div>
            </td>		
        </tr>
        <tr>
            <td><img src="<?php echo $r->ruta_foto;?>" alt="" /></td>
        </tr>
        <tr>
			<td> <small>Valoración media:</small> <h5><?php echo $r->puntos_media; ?></h5>
            
            <small><?php echo $r->num_votos; ?> usuarios han valorado este producto</small></td>
        </tr>
        <tr>
            <td>
                <a href="?c=Web&a=ValorarProducto&id_producto=<?php echo $r->id_producto; ?>">Valorar</a>
            </td>
        </tr>   
        </tbody>
    </table>
    </div> 
    </div> 
</div> 

<?php endforeach; ?>

</div>  