<div id="content">

	<div class="row">
		<div class="span12">
			<div class="text-center intro">
				<strong>Contactenos</strong>
				<p>
					Somos una empresa de Sociedad Limitada, altamente especializada en el mantenimiento e instalación
					de los sistemas de protección contra incendios.  
				</p>
			</div>
		</div><!-- end .span12 -->
	</div><!-- end .row -->

	<div class="row">
		<div class="span12">
			<?php if(!empty($msj)): ?>
			<div class="alert success" style="text-align: center;">
                <i class="fa fa-check-circle-o"></i>Mensaje enviado <strong>exitosamente</strong>!!
            </div>
			<?php endif; ?>
		</div>
	</div>


	<div class="row">
		<div class="span6">
			{{ if session:messages }}
			<div class="session-message-box">
			    <div class="container">
			        <div class="session-messages">
			            <!-- Flashdata and session messages -->
			            {{ session:messages success="alert success" notice="alert" error="alert error" }}
			            	{{ message }}
			            {{ /session:messages }}
			        </div>
			    </div>
			</div>
			{{ endif }}

			<form class="fixed" name="contact-form" method="post" action="<?php echo site_url('home/send'); ?>"> 
				<fieldset>

					<div id="formstatus"></div>
					<div class="row">
						<input type="text" name="name" value="<?php echo set_value('name') ?>" placeholder="Nombre" style="width: 100%;" required="required">
						<input type="text" name="company" value="" placeholder="Empresa" style="width: 100%;">
						<input type="email" name="email" value="" placeholder="E-mail" style="width: 100%;" required="required">
						<input type="text" name="phone" value="" placeholder="Telefono" style="width: 100%;" required="required">
					</div>

					<textarea class="span6" name="message" rows="10" cols="25" placeholder="Mensaje" required="required"></textarea>

					<input class="btn btn-green-dark float-right bhover" id="submit" type="submit" name="submit" value="Enviar Mensaje">

				</fieldset>
			</form>
		</div><!-- end .span3 -->

		<div class="span6">

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.7981060840625!2d-74.09779743914798!3d4.630078042090705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bde4e53e4a7%3A0x10352775b9bc4f21!2sLaboratorios+Synthesis!5e0!3m2!1ses-419!2ses!4v1415058578500" width="100%" height="310" frameborder="0" style="border:0"></iframe>

		</div><!-- end .span9 -->
	</div><!-- end .row -->
	<br><br>

</div>
<style>
	.bhover{
		position: absolute;
		background-color: #204594;
	}.bhover:hover{
		background-color: #f13d46;
	}
</style>
