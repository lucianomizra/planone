    <nav>
        <div class="brand-bar">
            <ul class="container">
              <?

                $brands = $b->nuevo('brands');
                foreach ($brands->r as $key => $brand) {

                    $dealership = $brands->parent_dealership($brand['id'], $location->user_location['province']);
                    echo '<li';
                    if ( isset($_GET['b']) && $_GET['b'] == $brand['link'] ) { echo ' class="active"'; }
                    echo'><a href="'.PATH.'catalogo/'.$brand['link'].'" data-toggle="tooltip" data-placement="bottom" title="'.$brand['brand'].'<br>'.$dealership['name'] .'" style="background-image:url(\''.PATH.'uploads/brands/'.$brand['thumbnail'].'\')">'.$brand['brand'].'</a>';
                    /*<a href="<? echo PATH; ?>concesionaria/<? echo $dealership['id']; ?>">*/
                    if ($dealership['name']) { ?>
                    <div class="dealership"><? echo $dealership['name']; ?></div>
                    <? }
                    //</a>
                    echo '</li>';
                }
              ?>
            </ul>
        </div>
    </nav>