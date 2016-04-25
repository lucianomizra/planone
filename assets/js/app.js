$(document).ready( function() {

    new WOW().init();

    $('[data-toggle="tooltip"]').tooltip({html: true})

    $cars = $('.catalogo .widget-car-preview');
    var time = 0;
    $cars.each(function() {
      var car = $(this);

      var link = car.find('[link-to-details]').attr('href');

      car.find('[go-to-details]').on('click', function() {
        window.location.assign(link);
      });

    });


    $('[data-toggle="tooltip"]').tooltip();


    $('.adDealership').on('click',function() {

      var link = $(this).find('a').attr('href');
      
      window.location.assign(link);

    });


    $('#description').summernote({
      height: 150,   //set editable area's height
      codemirror: { // codemirror options
        theme: 'monokai'
      },
        toolbar: [
          //[groupname, [button list]]
           
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
        ]
    });

    $(document).scroll(function() {
      if($('#fixed-brands-bar')[0] != undefined) {

        if( screen.height - $(document).scrollTop() < $('#fixed-brands-bar')[0].offsetTop + $('#fixed-brands-bar').height() ) {
           $('#fixed-brands-bar').addClass('no-fixed').removeClass('fixed');
        } else {
           $('#fixed-brands-bar').addClass('fixed').removeClass('no-fixed');
        }
      }
    });

    $('.change-location').on('click',function() {
      $('#modal-location').modal();
    });

  $('#contact .submit').click(function() {
  $.ajax({
          type:'POST',
          url:url+'server/send_mail.php',
          data:$('#contact').serialize(),
          success:function(data){ 
              
              if(data.success){
                  $('#contact .form').fadeOut('slow', function () { $('#contact .success').fadeIn('slow'); } );
              } else {
                  $('[name="'+data.error+'"]').css('border-color','red').focus();
              };
          },
          error:function(){
              form_alerts( data.message );
          },
          dataType:'json'
      });
  });
});