<? 
	$province = $location->user_location['province'];
	$brand_obj = $b->nuevo('brands');
	$dealership_data = $brand_obj->parent_dealership($brands_id, $province);
?>
<div class="col-md-3 widget-car-preview wow fadeIn" data-brand="<? echo $brands_id ?>">
	<article>
        <figure go-to-details><img src="<? echo PATH; ?>uploads/cars/<? echo $thumbnail ?>" alt="<? echo $name ?>"></figure>
        <? if ($dealership_data['thumbnail']) { ?>
        <a href="<? echo PATH; ?>concesionaria/<? echo $dealership_data['id']; ?>"><img src="<? echo PATH; ?>uploads/dealerships/<? echo $dealership_data['thumbnail'] ?>" alt="<? echo $dealership_data['name'] ?>" class="dealership"></a>
        <? } ?>
        <img src="<? echo PATH; ?>uploads/brands/<? echo $thumbnail_brand ?>" alt="<? echo $brand ?>" class="brand">
        <h2><a href="<? echo PATH; ?>pages/car/?i=<? echo $id; ?>" link-to-details><? echo $name ?></a></h2>
        <? if ($dealership_data['name']) { ?>
        <br><span>Concesionaria: <a href="<? echo PATH; ?>concesionaria/<? echo $dealership_data['id']; ?>"><? echo $dealership_data['name'] ?></a></span>
        <? } ?>
        <p>Plan <? echo $plan1 ?> desde <strong>$<? echo $cuota1 ?></strong><br>
		<? if ( strlen($plan2) > 1 ) { ?>Plan <? echo $plan2 ?> desde <strong>$<? echo $cuota2 ?></strong><? } ?>
        </p>
        <span class="btn btn-primary btn-xs pull-right" go-to-details>Consultar</span>
	</article>
</div>