<form class="contact-form basic-form wow fadeInUp"  id="contact" role="form">
    <div class="row">
        
    <!-- IF MAIL SENT SUCCESSFULLY -->
    <h4 class="success">
        <i class="icon_check"></i> Tu mensaje ha sido enviado correctamente.
    </h4>

    <!-- IF MAIL SENDING UNSUCCESSFULL -->
    <h4 class="error">
        <i class="icon_error-circle_alt"></i> El e-mail debe ser válido y el mensaje debe contener más de 1 caracter.
    </h4>

    <div class="form">
        
        <div class="col-md-6">
            <input class="form-control input-box" id="name" type="text" name="name" placeholder="Tu nombre">
        </div>

        <div class="col-md-6">
            <input class="form-control input-box" id="email" type="email" name="email" placeholder="Tu e-mail">
        </div>

        <div class="col-md-6">
            <input class="form-control input-box" id="subject" type="text" name="subject" placeholder="Asunto">
        </div>
        <div class="col-md-6">
            <input class="form-control input-box" id="phone" type="text" name="phone" placeholder="Telefono">
        </div>

        <div class="col-md-12">
            <textarea class="form-control textarea-box" id="message" rows="8" placeholder="Mensaje"></textarea>
        </div>

        </div>
        
        <input type="hidden" name="province" value="<? echo $location->getProvince( $location->user_location['province'] ) ?>">
        <button class="btn btn-primary standard-button2 ladda-button submit" type="button" id="submit" name="submit" data-style="expand-left">Enviar</button>
    </div>

</form>