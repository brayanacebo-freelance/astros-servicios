<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Nuevo Cliente</header>
            <div class="panel-body">
                <?php echo form_open_multipart(site_url('admin/home/store_customer'), 'class="form-horizontal"'); ?>

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
                                <label class="control-label col-md-2">Imagen</label>
                                <div class="controls col-md-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="No hay imagen" />
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
                                            - Ancho 519px<br>
                                            - Alto 413px
                                        </span>
                                     </div>
                                 </div>
                             </div>
                         </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Link</label>
                        <div class="col-md-7 col-xs-11">
                            <?php echo form_input('link', set_value('link'), 'class="form-control"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                            <button type="submit" name="btnAction" value="save" class="btn btn-primary"><span>Guardar</span></button>
                            <a href="<?php echo base_url('admin/home'); ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>

                </div>
            </div>
            <?php echo form_close() ?>
        </div>        
    </section>
</div>
</div>