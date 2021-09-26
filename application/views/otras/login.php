<body>
    <div>
        <form method="POST" action="<?php echo base_url(); ?>index.php/GestionUsuario/autenticacion" class="bg-white  rounded-5 shadow-5-strong p-5">
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">User name</label>
                <input name="userName" type="text" id="form1Example0" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example2">Ingrese su contraseña</label>
                <input name="contraseña" type="password" id="form1Example2" class="form-control" />
            </div>
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesion </button>
            </div>
        </form>
    </div>
</body>