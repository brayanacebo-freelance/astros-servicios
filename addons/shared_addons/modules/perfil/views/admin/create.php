<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Nueva Novela o Serie</header>
            <div class="panel-body">
                <?php echo form_open_multipart(site_url('admin/perfil/store'), ' class="form-horizontal"') ?>

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
                                <?php echo  form_input('title', set_value('title'), 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Fecha</label>
                            <div class="col-md-2 col-xs-11">
                                <?php echo  form_input('date', set_value('date'), 'class="form-control default-date-picker"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Video de YouTuBe</label>
                            <div class="col-md-8 col-xs-11">
                                <?php echo  form_input('video', set_value('video'), 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Pais</label>
                            <div class="col-md-4 col-xs-11">
                                <?php echo  form_input('country', set_value('country'), 'class="form-control"') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 req">Descripción</label>
                            <div class="col-sm-9">
                                <textarea class="form-control ckeditor" name="description" rows="6"><?php echo set_value('description') ?></textarea>
                                <span class="help-block">Evite pegar texto directamente desde un sitio web u otro editor de texto, de ser necesario use la herramienta pegar desde.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
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