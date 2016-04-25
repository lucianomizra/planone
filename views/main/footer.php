    <footer>

        <div id="footer">
            <div class="container">
                <ul>
                    <li>Copyright & todos los derechos reservados</li>
                    <li><a href="#">Aspectos legales</a></li>
                    <li><a href="#">Política y privacidad</a></li>
                    <li>
                        <? if ( $location->getProvince( $location->user_location['province'] ) ) : ?>
                            <a href="#ubicacion"><strong class="change-location"><? echo $location->getProvince( $location->user_location['province'] ) ?></strong></a>
                        <? endif; ?>
                    </li>
                </ul>

                <a href="<? echo PATH ?>" id="footerlogo"><img src="<? echo PATH ?>assets/imgs/logo.png" alt="PlanOne"></a>
            </div>
        </div>
    </footer>

    <? view('modals/location'); ?>

    <script src="<? echo PATH ?>assets/js/jquery.min.js"></script>  
    <script src="<? echo PATH ?>assets/js/bootstrap.min.js"></script>
    <script src="<? echo PATH ?>assets/js/modernizr.custom.js"></script>
    <script src="<? echo PATH ?>assets/js/jquery.cslider.js"></script>
    <script type="text/javascript" src="<? echo PATH ?>assets/js/summernote.js"></script>
    <script src="<? echo PATH ?>assets/js/fileinput.min.js"></script>
    <script src="<? echo PATH ?>assets/js/fileinput_locale_es.js"></script>
    <script src="<? echo PATH ?>assets/js/wow.min.js"></script>
    <script src="<? echo PATH ?>assets/js/app.js"></script>

  </body>
</html>
<script type="text/javascript">
    $(function() {

        <? if(! $location->getProvince( $location->user_location['province'] ) ) { ?>
        $('#modal-location').modal({
            backdrop: 'static',
            keyboard: true
        });
        <? } ?>

        
        $('#select-province').on('change',function() {

            var id_province = $(this).val();

            var txt_province = $(this).find(':selected').html();

            $('[name=province]').val(txt_province);

            $.ajax({
                type:'POST',
                url:'<? echo PATH ?>server/change_location.php',
                data:{ province:id_province },
                dataType: 'json'
            }).done(function() {
                window.location.reload(false);
            });

        });

    });

</script> 