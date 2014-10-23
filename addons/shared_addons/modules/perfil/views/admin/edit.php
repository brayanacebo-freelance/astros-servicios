<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Editar Novela o Serie</header>
            <div class="panel-body">
                <?php echo form_open_multipart(site_url('admin/perfil/update'), ' class="form-horizontal"') ?>

                <div class="tab-content">
                    <div id="create" class="tab-pane active">
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
                            <label class="control-label col-md-2 req">Titulo</label>
                            <div class="col-md-4 col-xs-11">
                                <?php echo  form_input('title', $chapter->title, 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Fecha</label>
                            <div class="col-md-2 col-xs-11">
                                <?php echo  form_input('date', explode(' ', $chapter->date)[0], 'class="form-control default-date-picker"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Video de YouTuBe</label>
                            <div class="col-md-8 col-xs-11">
                                <iframe width="420" height="315" src="<?php echo $chapter->video ?>" frameborder="0" allowfullscreen></iframe>
                                <?php echo  form_input('video', $chapter->video, 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Pais</label>
                            <div class="col-md-4 col-xs-11">
                                <?php echo  form_input('country', $chapter->country, 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Descripción</label>
                            <div class="col-sm-9">
                                <textarea class="form-control ckeditor" name="description" rows="6"><?php echo $chapter->description ?></textarea>
                                <span class="help-block">Evite pegar texto directamente desde un sitio web u otro editor de texto, de ser necesario use la herramienta pegar desde.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <?php echo form_hidden('id', $chapter->id); ?>
                                <button type="submit" name="btnAction" value="save" class="btn btn-primary"><span>Guardar</span></button>
                                <a href="<?php echo base_url('admin/perfil'); ?>" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>

                    </div>
                </div>
                <?php echo form_close() ?>
            </div>        
        </section>
    </div>
</div>