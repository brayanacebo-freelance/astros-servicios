
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#chapter">Novelas y Series</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#perfil">Perfil</a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="chapter" class="tab-pane active">
                        <a href="admin/perfil/create" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Fecha</th>
                                        <th>Pais</th>
                                        <th width="180"><?php echo lang('global:actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($chapters as $chapter) : ?>
                                    <tr class="">
                                        <td><?php echo $chapter->title ?></td>
                                        <td><?php echo fecha_spanish_full($chapter->date) ?></td>
                                        <td><?php echo $chapter->country ?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/perfil/images/' . $chapter->id) ?>" title="Imagenes" class="btn btn-success btn-sm"><i class="fa fa-picture-o"></i></a>
                                            <a href="<?php echo site_url('admin/perfil/edit/' . $chapter->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo site_url('admin/perfil/destroy/' . $chapter->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="perfil" class="tab-pane">
                    <?php echo form_open_multipart(site_url('admin/perfil/update_video'), ' class="form-horizontal"') ?>

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
                                <label class="control-label col-md-2 req">Video de YouTuBe</label>
                                <div class="col-md-8 col-xs-11">
                                    <iframe width="520" height="415" src="<?php echo $perfil->video ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php echo  form_input('video', $perfil->video, 'class="form-control"') ?>
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