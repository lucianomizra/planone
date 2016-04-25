<?php 
    $section='consecionaria-nueva';
    $title="Cargar consecionaria";


    define('PATH', '../../');
    require_once(PATH.'siempre.php');

    view('main/headers');
    view('main/header');

    $dealership = $b->nuevo('dealerships')
    ?>

    <div class="container main">
        <section>
        	<article class="article">
            <h2>Forma parte de PlanOne</h2>
            <hr>
            
            <? view('widgets/new-dealerships-form', get_object_vars($dealership)); ?>
			</article>
      	</section>
    </div>

 <?
    view('main/footer');
?>
