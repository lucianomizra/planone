<?php 
    $section='concesionaria';

    define('PATH', '../');
    require_once(PATH.'siempre.php');

    if ( isset($_GET['i']) && is_numeric($_GET['i']) ) {
        $dealership = $b->nuevo('dealerships',array('id'=>$_GET['i']));

        if(!$dealership->exists) redirect('pages/404');
    } else {
        redirect('pages/404');
    }
    
    $title = $dealership->name . ', Concesionaria';

    view('main/headers');
    view('main/header', array('nobrands'=>true) );


    ?>
    <div class="full-sep bg-color5">
            
        <div class="container">
            <h2>- <? echo $dealership->name ?> Concesionaria -</h2>
            <div class="dealership-brands">
                <ul class="brands">
                    <? foreach ($dealership->brands_ids as $brand_id => $brand) : 
                        echo '<li><a href="'.PATH.'catalogo/'.$brand['link'].'" style="background-image:url(\''.PATH.'uploads/brands/'.$brand['thumbnail'].'\')"></a></li>';
                    endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container main">
        <section>
            <article class="article row">
            <div class="dealership-logo col-md-3">
                <div class="figure wow fadeIn">
                    <img src="<? echo PATH ?>uploads/dealerships/<? echo $dealership->thumbnail ?>" alt="<? echo $dealership->thumbnail ?>">
                </div>
            </div>
            <div class="col-md-9">
                
            <h1 class="wow fadeInDown"><? echo $dealership->name ?></h1>
            <p>Provincia: <strong><? echo $location->getProvince( $dealership->province ) ?></strong></p>
            <p><? echo $dealership->description ?></p>
            </div>
            <br>
            <br>
            <br>
            </article>
      	</section>
        <section>
            <? view('widgets/contact-form'); ?>
            <hr class="wow fadeIn">
        </section>
    </div>

 <?
    
    view('main/footer');
?>
