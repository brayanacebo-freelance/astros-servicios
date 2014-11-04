<!doctype html>
<html>
    <body>

        <h3>Hola,</h3>

        <p>Hay alguien que desea ponerse en contacto con usted, a continuaci&oacute;n sus datos.</p>

        <strong>Nombre y Apellido: </strong> <label><?php echo @$post['name'] ?></label><br>
        <strong>E-mail: </strong> <label><?php echo @$post['email'] ?></label><br>
        <strong>Teléfono: </strong> <label><?php echo @$post['phone'] ?></label><br>
        <strong>Empresa: </strong> <label><?php echo @$post['company'] ?></label><br>

        <strong>Mensaje: </strong> 
        <div style="width: 700px;">
            <label><?php echo @$post['message'] ?></label>  
        </div>

        <br><br>
        <img src="http://www.blissfulproductivity.com/wp-content/uploads/2013/02/linea.jpg">
        <br>
        <div style="text-align: center">
            <p style="color: green;font-size: 12px;text-align: justify">Evite imprimir, piense en su compromiso con el Medio Ambiente.</p>
        </div>

    </body>
</html>