<?php 
    $section='clasificados';
    
    $title= "Clasificados";

	define('PATH', '../../');
    require_once(PATH.'siempre.php');
    include_once(PATH.'views/main/headers.php');
    include_once(PATH.'views/main/header.php');
    ?>

    <div class="container main">
        <section>
        	<article class="article">
            <h2>CLASIFICADOS</h2>
            <hr>
                <p>En breve Ud. dispondra en esta WEB un espacio para la publicación, venta y reventa de planes de Ahorro en marcha,<span style="color: red;"> SIN CARGO</span></p>
                <ol>
                <li>ahorristas o adjudicados&nbsp;</li>
                <li>al dia o atrasados</li>
                <li>en marcha o rescindidos</li>
                <li>Identificados por marca y modelo</li>
                <li>Tipo de plan</li>
                <li>Cantidad de Cuotas</li>
                <li>Precio</li>
                </ol>
                <p>ABIERTO A TODOS LOS CONCESIONARIOS Y USUARIOS</p>
                <p>GRACIAS POR ESPERARNOS</p>
                <p>LA PAGINA ESTA EN DESARROLLO</p>
			</article>
      	</section>
    </div>

 <?
    include_once(PATH.'views/main/footer.php');
?>
