
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Productos</header>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <a href="admin/products/create" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                        <th>Destacado</th>
                                        <th width="180"><?php echo lang('global:actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo $product->name ?></td>
                                        <td>
                                            <?php if (!empty($product->image)): ?>
                                            <img src="<?php echo site_url($product->image); ?>" style="height: 130px;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo substr(strip_tags($product->description), 0,100) ?></td>
                                    <td style="text-align: center;">
                                        <a class="outstanding_product" href="admin/products/outstanding_product/<?php echo $product->id; ?>">
                                            <?php if($product->outstanding): ?>
                                            <i class="fa fa-star" style="font-size: 20px;color: rgb(255, 223, 0);"></i>
                                            <?php endif; ?>
                                            <?php if(!$product->outstanding): ?>
                                            <i class="fa fa-star-o" style="font-size: 20px;"></i>
                                            <?php endif; ?>
                                        </a> 
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('admin/products/images/' . $product->id) ?>" title="Imagenes" class="btn btn-success btn-sm"><i class="fa fa-picture-o"></i></a>
                                        <a href="<?php echo site_url('admin/products/edit/' . $product->id) ?>" title="Editar" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo site_url('admin/products/destroy/' . $product->id) ?>" title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" href="#ModalEliminar"><i class="fa fa-trash-o"></i></a>
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