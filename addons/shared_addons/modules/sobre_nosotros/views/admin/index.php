
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Sobre Nosotros
            </header>
            <div class="panel-body">
                <?php echo form_open_multipart(site_url('admin/sobre_nosotros/'), ' class="form-horizontal"'); ?>

                <div class="form-group">
                    <label class="control-label col-md-2"></label>
                    <div class="col-md-6 col-xs-11">
                        <span class="label label-danger">NOTA!</span>
                        <span>
                           Los campos señalados con <span style="color: red">*</span> son obligatorios.
                       </span>
                   </div>
               </div>

               <div class="form-group">
                <label class="control-label col-md-2">Imagen</label>
                <div class="controls col-md-10">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="height: 150px;">
                            <?php if ($data->image): ?>
                                    <img src="<?php echo site_url($data->image) ?>" height="150">
                            <?php endif; ?>
                            <?php if (!$data->image): ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="No hay imagen" />
                            <?php endif; ?>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                         <span class="btn btn-white btn-file">
                             <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Seleccionar imagen</span>
                             <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                             <input type="file" class="default" name="image"/>
                         </span>
                         <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                         <span class="help-block">
                            - Imagen Permitidas gif | jpg | png | jpeg<br>
                            - Tamaño Máximo 2 MB<br>
                            - Ancho 1063px<br>
                            - Alto 276px
                        </span>
                     </div>
                 </div>
             </div>
         </div>

               <h3>Bloque #1</h3>

               <div class="form-group">
                <label class="control-label col-md-2 req">Titulo</label>
                <div class="col-md-7 col-xs-11">
                    <?php echo form_input('title_one', set_value('title_one', isset($data->title_one) ? $data->title_one : ""), 'class="form-control" '); ?>
                    <span class="help-block">Texto de Introducción</span>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-2 req">Texto</label>
            <div class="col-sm-9">
                <textarea class="form-control ckeditor" name="text_one" rows="6"><?php echo $data->text_one; ?></textarea>
                <span class="help-block">Evite pegar texto directamente desde un sitio web u otro editor de texto, de ser necesario use la herramienta pegar desde.</span>
            </div>
        </div>

        <hr>

        <h3>Bloque #2</h3>

         <div class="form-group">
                <label class="control-label col-md-2 req">Titulo</label>
                <div class="col-md-7 col-xs-11">
                    <?php echo form_input('title_two', set_value('title_two', isset($data->title_two) ? $data->title_two : ""), 'class="form-control" '); ?>
                    <span class="help-block">Texto de Introducción</span>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-2 req">Texto</label>
            <div class="col-sm-9">
                <textarea class="form-control ckeditor" name="text_two" rows="6"><?php echo $data->text_two; ?></textarea>
                <span class="help-block">Evite pegar texto directamente desde un sitio web u otro editor de texto, de ser necesario use la herramienta pegar desde.</span>
            </div>
        </div>

        <h3>Bloque #3</h3>

         <div class="form-group">
                <label class="control-label col-md-2 req">Titulo</label>
                <div class="col-md-7 col-xs-11">
                    <?php echo form_input('title_three', set_value('title_three', isset($data->title_three) ? $data->title_three : ""), 'class="form-control" '); ?>
                    <span class="help-block">Texto de Introducción</span>
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-2 req">Texto</label>
            <div class="col-sm-9">
                <textarea class="form-control ckeditor" name="text_three" rows="6"><?php echo $data->text_three; ?></textarea>
                <span class="help-block">Evite pegar texto directamente desde un sitio web u otro editor de texto, de ser necesario use la herramienta pegar desde.</span>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-6">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>

        <?php echo form_hidden('id', $data->id); ?>
        <?php echo form_close(); ?>
    </div>
</section>
</div>
</div>

