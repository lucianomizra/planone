<?php 
    $section='contactanos';
    $title="Contactanos";


    define('PATH', '../../');
    require_once(PATH.'siempre.php');

    view('main/headers');
    view('main/header');
    ?>

    <div class="container main">
        <section>
        	<article class="article">
            <h2>Contactanos</h2>
            <hr>
                <? view('widgets/contact-form'); ?>
			</article>
      	</section>
    </div>

 <?
    view('main/footer');
?>
