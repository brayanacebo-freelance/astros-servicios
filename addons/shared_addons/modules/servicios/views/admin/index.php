
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Servicios</header>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <a href="admin/servicios/create" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                        <th width="180"><?php echo lang('global:actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($servicios as $servicio) : ?>
                                    <tr>
                                        <td><?php echo $servicio->name ?></td>
                                        <td>
                                            <?php if (!empty($servicio->image)): ?>
                                            <img src="<?php echo site_url($servicio->image); ?>" style="height: 130px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo substr(strip_tags($servicio->description), 0,100) ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/servicios/images/' . $servicio->id) ?>" title="Imagenes" class="btn btn-success btn-sm"><i class="fa fa-picture-o"></i></a>
                                        <a href="<?php echo site_url('admin/servicios/edit/' . $servicio->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo site_url('admin/servicios/destroy/' . $servicio->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
</div>