<? 
	$province = $location->user_location['province'];
	$brand_obj = $b->nuevo('brands');
	$dealership_data = $brand_obj->parent_dealership($brands_id, $province);
?>
<article class="article widget-car-details">
	<figure><img src="<? echo PATH; ?>uploads/cars/<? echo $thumbnail ?>" alt="<? echo $name ?>"></figure>
	<p class="plan-details">
	Plan <? echo $plan1 ?> desde $<? echo $cuota1 ?><br>
	<? if ( strlen($plan2) > 1 ) { ?>Plan <? echo $plan2 ?> desde <strong>$<? echo $cuota2 ?></strong><? } ?>
	</p>
	<? if($description) { ?>
	<div class="car-description">
		<h1 class="wow fadeIn"><? echo $brand ?>, <? echo $name ?></h1>
		<p class="wow fadeIn"><? echo $description ?></p>
	</div>
	<? } else { ?>
	<div class="car-description">
		<h1 class="wow fadeIn"><? echo $brand ?>, <? echo $name ?></h1>
		<p></p>

	<? } ?>
	<? if ($dealership_data['name']) { ?>
	<h4 class="wow fadeIn">Concesionaria: <a href="<? echo PATH; ?>concesionaria/<? echo $dealership_data['id']; ?>"><? echo $dealership_data['name'] ?></a></h4>
	<? } ?>
	</div>
</article>