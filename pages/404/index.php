<?php 
    $section='contactanos';
    $title = 'Error 404';

	define('PATH', '../../');
    require_once(PATH.'siempre.php');
    view('main/headers');
    view('main/header');
    ?>
    <div class="full-sep">
            
        <div class="container">
            <h2>- Error 404 -</h2>
        </div>
    </div>
    <div class="container main">
        <section>
        	<article class="article">
            <hr>
            <h2>La página que estás buscando es inexistente.</h2>
            <br>
            <br>
            <br>
			</article>
      	</section>
    </div>

 <?
    view('main/footer');
?>
