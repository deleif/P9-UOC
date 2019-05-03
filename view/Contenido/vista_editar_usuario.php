<br><h1>ADMINISTRACIÓN</h1><br>
<h2>Editar usuario: <?php echo $user->nombre_usuario; ?></h2><br>

<div class="row justify-content-center">
<form action="?c=Web&a=Guardar_Usuario" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $user->id_usuario; ?>" />
    
    <div class="form-group" >
        <label>Nivel de usuario</label>
        <select name="id_nivel" value="<?php echo $user->id_nivel; ?>" class="form-control" placeholder="Ingrese el nivel">
                <option value="1">Novato</option>
                <option value="2">Intermedio</option>
                <option value="3">Experto</option>
            </select>
    </div>
    
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="nombre_usuario" value="<?php echo $user->nombre_usuario; ?>" class="form-control" placeholder="Ingrese su usuario" style="text-align: center"/>
    </div>

    <div class="form-group" >
        <label>Password</label>
        <input type="password" name="password_usuario" value="<?php echo $user->password_usuario; ?>" class="form-control" placeholder="Ingrese su contraseña" style="text-align: center"/>
    </div>
    
    <hr/>
    
    <div class="form-group">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
</div><br>
