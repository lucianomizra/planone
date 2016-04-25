<?php 
    $section='consecionaria-nueva-success';
    $title="Datos enviados";


    define('PATH', '../../');
    require_once(PATH.'siempre.php');

    view('main/headers');
    view('main/header');
    ?>

    <div class="container main">
        <section>
        	<article class="article">
            <h2>Gracias por enviarnos los datos de su concesionaria</h2>
            <hr>
            <p>
                Revisaremos cuidadosamente toda su informacion y nos podremos en contacto con usted a la brevedad.
            </p>
            <br>
            <br>
            <br>
            <br>
			</article>
      	</section>
    </div>

 <?
    view('main/footer');
?>
