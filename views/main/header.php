<body id="single-page" class="section-<? if(isset($section)) echo $section ?>">

<header id="header" class="header<? if(isset($nobrands)) echo " nobrands"; ?>">
<div class="container">
	
    <figure id="logo">
        <a href="<? echo PATH ?>"><img src="<? echo PATH ?>assets/imgs/logo-dark.png" alt="PlanOne"></a></a>
        <figcaption>
          <h1>PlanOne</h1>
        </figcaption>

    </figure>
	
	<div class="right-header">
		
    <h2>Comunidad de Concesionarios Automotores</h2>
    <? if ( $location->getProvince( $location->user_location['province'] ) ) : ?>
    	<div>Ubicación <strong class="change-location"><? echo $location->getProvince( $location->user_location['province'] ) ?></strong></div>
	<? endif; ?>
	</div>

</div>
<? view('main/nav-bar'); ?>
<? if(!isset($nobrands)) view('main/brands-bar'); ?>

</header>