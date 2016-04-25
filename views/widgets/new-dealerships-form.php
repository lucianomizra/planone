<form class="new-dealerships-form basic-form" id="contact" method="post" action="<? echo PATH ?>server/add_dealership.php" action="<? echo PATH ?>server/add_dealership.php" enctype="multipart/form-data">
        <div class="row">
        <? if( $b->is_panel_admin() ) : ?>
        <? if($id) : ?><input type="hidden" name="id" value="<? echo $id ?>"><? endif; ?>
        <input type="hidden" name="is_panel_admin" value="1">
        <? endif; ?>

        <h4 class="success">
            <i class="icon_check"></i> Perfecto, ya guardamos tus datos, ahora los vamos a revisar todos los datos antes de ingresar tu concesionaria en nuestra plataforma. Estamos en contacto.
        </h4>

        <div class="col-md-12">
            <h3>Tus datos</h3>
        </div>
        <div class="col-md-6">
                <input class="form-control input-box" ype="text" name="owner_name" placeholder="Tu nombre" value="<? echo $owner_name ?>">
        </div>
        <div class="col-md-6">
                <input class="form-control input-box" type="text" name="phone" placeholder="Telefono" value="<? echo $phone ?>">
        </div>

        <div class="col-md-12">
                <input class="form-control input-box" type="email" name="email" placeholder="Tu e-mail" value="<? echo $email ?>">
        </div>

        <div class="col-md-12">
         <h3>Datos de la concesionaria</h3>
        </div>
        <div class="col-md-6">
            <input class="form-control input-box" type="text" name="name" placeholder="Nombre de la concesionaria" value="<? echo $name ?>">
        </div>

        <div class="col-md-6">
            <select name="province" id="select-province" class="form-control">
            <? $selected_location = ($province) ? $province : $location->user_location['province'] ?>
              <? foreach ($location->provinces as $i => $province) { ?>
                <option value="<? echo $i; ?>" <? if($i == $selected_location) echo 'selected' ?>><? echo $province; ?></option>
              <? } ?>
            </select>
        </div>

        <div class="col-md-12">
            <p>Seleccione las marcas que trabaja:</p>
            <div class="form-group text-center">
               <? $brands = $b->nuevo('brands');
                foreach ($brands->r as $key => $brand) { ?>
                <label class="checkbox-inline">
                  <input type="checkbox" value="<? echo $brand['id'] ?>" name="dealerships-brands[]"<? if( array_key_exists($brand['id'], $brands_ids) ) echo ' checked' ?>> <? echo $brand['brand'] ?>
                </label>
               <? } ?>
            </div>
        </div>



        <div class="col-md-12">
            <textarea class="form-control textarea-box" id="description" name="description" rows="8" placeholder="Describe tu negocio..."><? echo $description ?></textarea>
        </div>
        <div class="col-md-12" style="padding-bottom:20px;"> 
            <input type="file" name="thumbnail" class="file" placeholder="Cargue su logo" >
            <p class="help-block">Logo de su concesionaria máximo 360x360px y un maximo de 2Mb.</p>
        </div>

        </div>
        
        <button class="btn btn-primary" type="submit" id="submit" name="submit">Enviar</button>

</form>