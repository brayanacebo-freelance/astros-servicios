<div id="content" style="margin-bottom: -120px;">

    <!-- /// CONTENT  /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <div id="page-header">

        <div class="row">
            <div class="span12">
                <div class="text-center intro">
                    <strong>Servicios</strong>
                    <p>
                        Somos una empresa de Sociedad Limitada, altamente especializada en el mantenimiento e instalación
                        de los sistemas de protección contra incendios.  
                    </p>
                </div>
            </div><!-- end .span12 -->
        </div><!-- end .row -->

        <div class="row">
        <div class="services">
            <?php foreach ($servicios as $service): ?>
               <div class="span4 service">
                <div class="icon-box-2 featured service-items">
                    <a href="<?php echo site_url('servicios/detalle/'.$service->slug) ?>">
                        <div class="services-image">
                            <img src="<?php echo $service->image ?>">
                        </div>
                    </a>

                    <div class="icon-box-content">
                        <h3 class="text-center">
                            <a href="<?php echo site_url('servicios/detalle/'.$service->slug) ?>"><strong><?php echo substr($service->name , 0, 50)?></strong></a>
                        </h3>
                        <p class="text-center featured-description"><?php echo substr($service->introduction , 0, 150)?></p>
                        <p class="text-right detail-project"><a href="<?php echo site_url('servicios/detalle/'.$service->slug) ?>" class="btn">Ver Servicio</a></p>
                    </div><!-- end .icon-box-content -->
                </div><!-- end .icon-box-2 -->
               </div><!-- end .span3 -->
            <?php endforeach; ?>
        </div>
    </div>

</div><!-- end #page-header -->

</div><!-- end #content -->