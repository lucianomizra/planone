<?php 
    $section='pages-car';

	define('PATH', '../../');
    require_once(PATH.'siempre.php');

    if ( isset($_GET['i']) && is_numeric($_GET['i']) ) {
        $car = $b->nuevo('cars',array('id'=>$_GET['i']));

        if(!$car->exists) redirect('pages/404');
    } else {
        redirect('pages/404');
    }
    $title = $car->brand . ', ' . $car->name;

    view('main/headers');
    view('main/header');
    
    ?>
    <div class="full-sep">
        <div class="container">
            <h2><img src="<? echo PATH; ?>uploads/brands/<? echo $car->thumbnail_brand ?>" alt="<? echo $car->brand ?>" class="brand"> <? echo $car->brand ?>, <? echo $car->name ?></h2>
        </div>
    </div>
    <div class="container main">
        <section>
            <div class="row">
                <div class="col-md-6"><? view('widgets/car-details',get_object_vars($car)); ?></div>
                <div class="col-md-6">
                    <div class="article widget-car-contact wow fadeIn">
                        <h3>Consulta sobre este auto</h3>
                        <p>Para obtener información sobre formas de pago, disponibilidad, colores y cualquier otra característica completa este sencillo formulario con tus datos y tu consulta. </p>
                        <? view('widgets/contact-form'); ?>
                    </div>
                </div>
            </div>
        	
            
      	</section>
    </div>

 <?
    view('main/footer');
?>
