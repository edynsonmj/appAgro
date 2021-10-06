<body>
    <div>
    <?php if (isset($logUsuario)) { ?>
            <script>alert("usuario erroneo");</script>
        <?php } else if(isset($logContra)){ ?>
            <script>alert("contraseña erronea");</script>
        <?php }else{
            echo "no hay estos valores";
        }
        ?>
        <form method="POST" action="<?php echo base_url(); ?>index.php/Frontal/cargarLogin" class="bg-white  rounded-5 shadow-5-strong p-5">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Intentar de nuevo </button>
            </div>
        </form>
        <form method="POST" action="<?php echo base_url(); ?>index.php" class="bg-white  rounded-5 shadow-5-strong p-5">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Inicio </button>
            </div>
        </form>
    </div>
</body>