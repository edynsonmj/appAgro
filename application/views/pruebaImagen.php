<!DOCTYPE html>
<html>

<head>
    <title>imagen perro</title>
</head>

<body>
    <form class="datosForm" name="datos" method="POST" action="<?php echo base_url(); ?>index.php/prueba/insertImagenProducto">

        <label class=labelForm>nombre</label> <br><input class=campoForm name="nombre" type="text" minlength="2" /><br><br>
        <label class=labelForm>cantidad</label><br> <input class=campoForm name="cantidad" type="text" minlength="5" /><br /><br>
        <label class=labelForm>Precio</label><br> <input class=campoForm name="precio" type="text" minlength="5" /><br /><br>
        <label class=labelForm>imagen</label><br> <input class=campoForm name="imagen" type="file" minlength="5" /><br /><br>
        <input class=boton type="submit" value="registrar" /><br>
    </form>
</body>

</html>