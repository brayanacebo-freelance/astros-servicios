<div id="content" style="margin-bottom: -80px;">
	<div class="row detail-service">
		{{ if images }}
		<div class="span6 service-images">
			<ul class="slider-services">
				{{ images }}
				<li><img width="100%" src="{{ path }}" /></li>
				{{ /images }}
			</ul>

			<div id="bx-pager">
				<?php $i=0;foreach ($images as $image): ?>
				<a data-slide-index="<?php echo $i ?>" href=""><img width="110" src="<?php echo $image->path ?>" /></a>
				<?php $i++;endforeach; ?>
			</div>
		</div><!-- end .team-member -->
		{{ endif }}
		<div class="<?php echo ($images) ? 'span6' : 'span12'?>" <?php echo ($images) ? '' : 'style="padding: 20px;"'?>>
			<div class="service-title"><strong style="line-height: 25px;">{{ service.name }}</strong></div>
			<br><br>
			<div class="service-text">
			{{ service.description }}
			</div>
			<a href="<?php echo site_url('contactenos') ?>" class="btn service-button">Solicitar Servicio</a>
			<a href="<?php echo site_url('servicios'); ?>" class="btn service-button-back2">Volver a servicios</a>
		</div><!-- end .span8 -->
	</div><!-- end .row -->

	<div class="row">
		<h5 style="margin-top: 35px;">Otros Servicios <span class="circle">.</span><hr style="width: 74%;margin-left: 212px;"></h5>

		<?php foreach ($services as $service): ?>
		 <div class="span4">
             <div class="icon-box-2 featured">
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