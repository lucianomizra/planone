<?php 
    $section='landing';

	define('PATH', '');
    require_once(PATH.'siempre.php');
    view('main/headers');
?>


  <body id="landing-page">
    <header id="header">
        <? view('main/nav-bar') ?>

        <figure id="logo">
            <img src="assets/imgs/logo.png" alt="PlanOne">
            <figcaption>
              <a href="/"><h1>PlanOne</h1></a>
            </figcaption>
        </figure>

        <h2>Comunidad de Concesionarios Automotores</h2>


    <div class="clearfix"></div>
    <div class="container">

        <div id="da-slider" class="da-slider">
            <?
            $last_cars = $b->nuevo('cars',array('limit'=>5,'random'=>true));

            foreach ($last_cars->r as $key => $car) { ?>
            <div class="da-slide">
                <div class="da-img"><img src="<? echo PATH; ?>uploads/cars/<? echo $car['thumbnail'] ?>" go-to-details /></div>
                <h2><a href="<? echo PATH; ?>pages/car/?i=<? echo $car['id']; ?>"  link-to-details><? echo $car['brand'] .', '.$car['name']; ?></a></h2>
                <p>Plan <? echo $car['plan1'] ?> desde <strong>$<? echo $car['cuota1'] ?></strong><br>
                <? if ( strlen($car['plan2']) > 1 ) { ?>Plan <? echo $car['plan2'] ?> desde <strong>$<? echo $car['cuota2'] ?></strong><? } ?>
                </p>
                <span class="da-link btn btn-primary" go-to-details>Consultar</span>
            </div>
            <? } ?>          
             
            <!-- navigation controls 
            <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </nav>-->
             
        </div> <!-- /da-slider -->
    <div class="clearfix"></div>
    </div>

    <div id="fixed-brands-bar" class="fixed" >
        <? view('main/brands-bar'); ?>
    </div>
    </header>


    <div class="container main">
        <section>
            <h2>Estos son los autos mas vendidos</h2>
            <hr>
            <div class="catalogo row">
                <?
                $last_cars = $b->nuevo('cars',array('limit'=>4));

                foreach ($last_cars->r as $key => $car) {
                        view('widgets/car-preview',$car);
                }
                ?>
            </div>
        </section>
    </div>


<? view('main/footer'); ?>
<script type="text/javascript">
    $(function() {

     
        $('#da-slider').cslider({
            autoplay    : true,
            bgincrement : 0,
            desktopClickDrag: true,
            snapToChildren: true
        });

        $('#da-slider .da-slide [go-to-details]').on('click', function() {
           
            var link =  $(this).parent().parent().find('[link-to-details]').attr('href');

            window.location.assign(link);

        });

    });

</script> 