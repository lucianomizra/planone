<?php 
    $section='catalogo';

    define('PATH', '../');
    require_once(PATH.'siempre.php');

    if(isset($_GET['b'])) {
      $brand = $b->nuevo('brands',array('link'=>$_GET['b']));
      $title= 'Planes de ahorro en '.$brand->brand;
    } else {
      $title= "Planes de ahorro en autos";
    }
    
    view('main/headers');
    view('main/header');


    ?>
    <div class="full-sep">
        <div class="container">
        <?
            if(isset($brand)) {
                $province = $location->user_location['province'];
                $dealership_data = $brand->parent_dealership($brand->id, $province);
                ?>
                <h2>- <? echo $brand->brand ?></a> -
                <? if($dealership_data['name']) { ?>
                <a href="<? echo PATH; ?>concesionaria/<? echo $dealership_data['id']; ?>">Concesionaria <? echo $dealership_data['name'] ?></a></h2>
                <? } ?>
                </h2> <?
            } else {
                ?>
                <h2>Todos los autos</h2>
                <?
            }
        ?>
        </div>
    </div>

    <div class="container main">
        <section>
            <div class="catalogo row">
                <?
                if(isset($brand)) {
                    $cars = $b->nuevo('cars', array('brands_id'=>$brand->id) );
                } else {
                    $cars = $b->nuevo('cars');
                }

                if( is_array($cars->r) ) {
                    foreach ($cars->r as $key => $car) {
                        view('widgets/car-preview',$car);
                    }
                } else {
                    echo '<h2>No encontramos ningun auto en esta marca.</h2><hr>';
                }
                ?>
            </div>
      	</section>
    </div>
    <? view('main/brands-bar'); ?>
    <? view('main/adDealership'); ?>


 <?
    view('main/footer');
?>