<div id="wrap">
    <div id="content">

        {{ theme:partial name="slider" }}

        <div class="row">
            
            <h5>Proyectos principales <span class="circle">.</span><hr></h5>

            {{ featured }}
            <div class="span4">
                <div class="icon-box-2 featured">
                    <a href="{{ link }}">
                        <img src="{{ image }}">
                    </a>

                    <div class="icon-box-content">
                        <h3 class="text-center">
                            <a href="{{ link }}"><strong>{{ title }}</strong></a>
                        </h3>
                        <p class="text-center featured-description">{{ description }}</p>
                        <p class="text-right detail-project"><a href="{{ link }}" class="btn">Ver Proyecto</a></p>
                    </div><!-- end .icon-box-content -->
                </div><!-- end .icon-box-2 -->
            </div><!-- end .span3 -->
            {{ /featured }}

            <div class="clear"></div>

            <div class="hidden-responsive">
            <h5 style="margin-top: 0px;">Nuestros clientes <span class="circle">.</span><hr style="width: 74%;margin-left: 212px;"></h5>

            
                    <div class="span12">
                        
                       <div class="slider-customer">
                        {{ customers }}
                          <div class="slide"><a href="{{ link }}" target="_blank"><img src="{{ image }}"></a></div>
                        {{ /customers }}
                        </div> 
                    
                    </div><!-- end .span12 -->
            </div><!-- end .row -->
                





        </div><!-- end #content -->

    </div><!-- end #wrap -->
</div>