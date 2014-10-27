
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#slider">Slider</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#customers">Clientes</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#featured">Destacados</a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">

                    <!-- SLIDER -->
                    <div id="slider" class="tab-pane active">
                        <a href="admin/home/edit_slider" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="table">
                                <br>
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Titulo</th>
                                        <th>Texto</th>
                                        <th>Link</th>
                                        <th width="90"><?php echo lang('global:actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($slider as $slide) : ?>
                                    <tr class="">
                                        <td>
                                            <?php if (!empty($slide->image)): ?>
                                            <img src="<?php echo site_url($slide->image); ?>" style="width: 139px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $slide->title ?></td>
                                    <td><?php echo $slide->text ?></td>
                                    <td><a href="<?php echo $slide->link ?>"><?php echo $slide->link ?></a></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/home/edit_slider/' . $slide->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo site_url('admin/home/destroy_slider/' . $slide->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CLIENTES -->
            <div id="customers" class="tab-pane">
                <a href="admin/home/new_customer" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Link</th>
                                <th><?php echo lang('global:actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($customer->image)): ?>
                                    <div style="height: 30px;overflow: hidden"><img src="<?php echo $customer->image; ?>" height="30"></div>
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo $customer->link ?>" target="_blank"><?php echo $customer->link ?></a></td>
                            <td>
                                <a href="<?php echo site_url('admin/home/edit_customer/' . $customer->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo site_url('admin/home/destroy_customer/' . $customer->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </table>
    </div>
</div>

<!-- DESTACADOS -->
<div id="featured" class="tab-pane">
    <div class="adv-table">
        <br>
        <table  class="display table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th style="width: 20%">Imagen</th>
                    <th style="width: 20%">Titulo</th>
                    <th style="width: 20%">Texto</th>
                    <th style="width: 20%">Link</th>
                    <th width="180"><?php echo lang('global:actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($featured as $item): ?>
                <tr>
                    <td>
                        <?php if (!empty($item->image)): ?>
                        <img src="<?php echo site_url($item->image); ?>" style="width: 139px;">
                    <?php endif; ?>
                </td>
                <td><?php echo $item->title ?></td>
                <td><?php echo $item->description ?></td>
                <td><a href="<?php echo $item->link ?>"><?php echo $item->link ?></a></td>
                <td>
                    <a href="<?php echo site_url('admin/home/edit_featured/' . $item->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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
