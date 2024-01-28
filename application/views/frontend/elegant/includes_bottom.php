<script src="<?php echo base_url('assets/frontend/elegant/js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/common_scripts.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/main.js'); ?>"></script>
<!-- MODERNIZR SLIDER -->
<script src="<?php echo base_url('assets/frontend/elegant/js/modernizr_slider.js'); ?>"></script>
<!-- FlexSlider -->
<script defer src="<?php echo base_url('assets/frontend/elegant/js/jquery.flexslider.js'); ?>"></script>

<script>
  $(window).load(function() {
    'use strict';
    $('#carousel_slider ul.slides li').on('mouseover', function() {
      $(this).trigger('click');
    });
	
    $('.flexslider').flexslider({
    animation: "fade",
    slideshowSpeed: 2500,
    animationSpeed: 1000, 
    rtl: true,
    start: function(slider){
      $('body').removeClass('loading');
    }
    });/*
    $('#slider').flexslider({
      animation: "fade",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#carousel_slider",
      start: function(slider) {
        $('body').removeClass('loading');
      }
    });
	
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: true,
  });
	*/
  });
function dangkyhoc(){
      $('#form_dangkyhoc').show('slow');
    }
</script>

<!-- TOASTR JS -->
<script src="<?php echo base_url().'assets/global/toastr/toastr.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/frontend/elegant/js/validate.js'); ?>"></script>

<!-- JSPdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
crossorigin="anonymous"></script>

<script src="<?php echo base_url('assets/frontend/elegant/js/custom.js'); ?>"></script>
