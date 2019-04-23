<h1>EDITAR USUARIO: <?php echo $user->nombre_usuario; ?></h1>
<h2>ID Usuario: <?php echo $user->id_usuario; ?></h2>

<form id="frm-alumno" action="?c=Web&a=Guardar_Usuario" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $user->id_usuario; ?>" />
    
    <div class="form-group">
        <label>ID Nivel</label>
        <select name="id_nivel" value="<?php echo $user->id_nivel; ?>" class="form-control" placeholder="Ingrese el nivel">
                <option value="1">Novato</option>
                <option value="2">Intermedio</option>
                <option value="3">Experto</option>
            </select>
    </div>
    
    <div class="form-group">
        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" value="<?php echo $user->nombre_usuario; ?>" class="form-control" placeholder="Ingrese su apellido"/>
    </div>

    <div class="form-group">
        <label>Password de usuario</label>
        <input type="password" name="password_usuario" value="<?php echo $user->password_usuario; ?>" class="form-control" placeholder="Ingrese su apellido"/>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>
