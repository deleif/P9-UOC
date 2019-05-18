<br><h1>INICIAR SESIÓN</h1><br>

<div class="row justify-content-center" >
<form action="?c=Web&a=Iniciar_sesion" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" value="<?php echo $user->nombre_usuario; ?>" class="form-control" placeholder="Ingrese su username" data-validacion-tipo="requerido|min:3" style="text-align: center"/>
    </div>
    
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password_usuario" value="<?php echo $user->password_usuario; ?>" class="form-control" placeholder="Ingrese su password" data-validacion-tipo="requerido|min:3" style="text-align: center"/>
    </div>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success">Acceder</button>
    </div>
    <?php
        if(isset($_SESSION["erroracceso"])){
        echo "<p><small>".$_SESSION["erroracceso"]."</P>";
        $_SESSION["erroracceso"] = "";                             }
    ?>
</form>
</div><br>