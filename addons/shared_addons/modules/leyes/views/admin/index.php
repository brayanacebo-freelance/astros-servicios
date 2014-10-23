
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#chapter">Leyes y Normatividad</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#leyes">Imagen Principal</a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="chapter" class="tab-pane active">
                        <a href="admin/leyes/create" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Fecha</th>
                                        <th width="180"><?php echo lang('global:actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($leyes as $ley) : ?>
                                    <tr class="">
                                        <td><?php echo $ley->title ?></td>
                                        <td><?php echo fecha_spanish_full($ley->created_at) ?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/leyes/edit/' . $ley->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo site_url('admin/leyes/destroy/' . $ley->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="leyes" class="tab-pane">
                    <?php echo form_open_multipart(site_url('admin/leyes/update_image'), ' class="form-horizontal"') ?>

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
                                                        <?php if (!empty($image->image)): ?>
                                                        <img src="<?php echo site_url($image->image) ?>" height="150">
                                                    <?php endif; ?>
                                                    <?php if (empty($image->image)): ?>
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
                                                - Ancho 1057px<br>
                                                - Alto 275px
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" name="btnAction" value="save" class="btn btn-primary"><span>Guardar</span></button>
                    </div>
                </div>

            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</section>
</div>
</div>