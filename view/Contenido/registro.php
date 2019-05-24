<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<br><h1>REGISTRAR NUEVO USUARIO</h1><br>
        <div class="row justify-content-center" >

        <script>

        
            function validar(frm) {
                if (frm.password_usuario.value != frm.password2.value) {
                    swal("Error", "Las contraseñas no coinciden", "error");
                    return false;
                }
            }
        </script>


        

			<form id="frm" name="frm"  onsubmit="return validar(this)" action="?c=Web&a=Guardar_usuarios" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nuevo usuario</label>
                    <input type="text" name="nombre_usuario" value="<?php echo $user->nombre_usuario; ?>" class="form-control"   placeholder="Nombre de usuario" required minlength="4" style="text-align: center">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  value="<?php echo $user->password_usuario; ?>" class="form-control" id= "password_usuario" name="password_usuario" placeholder="Contraseña"  required minlength="4" style="text-align: center">
                </div>
                <div class="form-group">
                    <label>Repite Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repite la contraseña"  required minlength="4" style="text-align: center">
                </div><hr/>
                <button type="submit" class="btn btn-success">Submit</button>

                <?php
                if(isset($_SESSION["errorregistro"])){
                echo "<p><small>".$_SESSION["errorregistro"]."</P>";
                $_SESSION["errorregistro"] = "";                             }
                 ?>
            </form>
        </div><br>
    
