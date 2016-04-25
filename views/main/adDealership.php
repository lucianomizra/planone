<? /*
$province = $location->user_location['province'];
$dealership = $b->nuevo('dealerships');
$ad_data = $dealership->get_for_banner($province);
$ad_data['brands'] = $dealership->get_brands($ad_data['id']);

if( $ad_data['name'] ) : 
?>
<div class="widget-ads">
	<div class="container">
		<div class="adDealership dealership-<? echo $ad_data['id'] ?>">
			<? if($ad_data['thumbnail']) : ?>
				<div class="figure wow infinite pulse">
					<img src="<? echo PATH ?>uploads/dealerships/<? echo $ad_data['thumbnail'] ?>" alt="<? echo $ad_data['name'] ?>">
				</div>
			<? endif; ?>
				<h2 class="wow bounceInLeft"><a href="<? echo PATH ?>concesionaria/<? echo $ad_data['id'] ?>"><? echo $ad_data['name'] ?></a></h2>
			<? if(count($ad_data['brands'])) : ?>
			<ul class="brands">
				<? foreach ($ad_data['brands'] as $brand_id => $brand) : 
                    echo '<li class="wow fadeInUp"><span style="background-image:url(\''.PATH.'uploads/brands/'.$brand['thumbnail'].'\')"></span></li>';
				endforeach; ?>
			</ul>
			<? endif; ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<? endif; ?>

*/ ?>