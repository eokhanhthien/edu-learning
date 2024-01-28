<footer class="d-print-none">
  <div class="container margin_60_35">
    <div class="row">
      <div class="col-lg-5 col-md-12 p-r-5">
        <p><img src="<?php echo base_url().'uploads/system/'.get_frontend_settings('light_logo'); ?>" height="42" data-retina="true" alt=""></p>
        <p><?php echo get_settings('slogan').'<br/>'.get_settings('address'); ?></p>
        <!-- <div class="follow_us">
          <ul>
            <li>Follow us</li>
            <li><a href="#0"><i class="ti-facebook"></i></a></li>
            <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
            <li><a href="#0"><i class="ti-google"></i></a></li>
            <li><a href="#0"><i class="ti-pinterest"></i></a></li>
            <li><a href="#0"><i class="ti-instagram"></i></a></li>
          </ul>
        </div> -->
      </div>
      <div class="col-lg-3 col-md-6 ml-lg-auto">
        <h5><?php echo site_phrase('useful_links'); ?></h5>
        <ul class="links">
          <li><a href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('courses'); ?></a></li>
          <li><a href="<?php echo site_url('home/login'); ?>"><?php echo site_phrase('login'); ?></a></li>
          <li><a href="<?php echo site_url('home/sign_up'); ?>"><?php echo site_phrase('register'); ?></a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <h5><?php echo site_phrase('contact_with_us'); ?></h5>
        <ul class="contacts">
          <li><a href="tel://<?php echo get_settings('phone'); ?>"><i class="ti-mobile"></i> <?php echo get_settings('phone'); ?></a></li>
          <li><a href="mailto:<?php echo get_settings('system_email'); ?>"><i class="ti-email"></i> <?php echo get_settings('system_email'); ?></a></li>
        </ul>
      </div>
    </div>
    <!--/row-->
    <hr>
    <div class="row">
      <div class="col-md-6 mt-2">
        <ul id="additional_links">
          <li><a href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo site_phrase('terms_&_conditions'); ?></a></li>
          <li><a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
          <li><a href="<?php echo site_url('home/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a></li>
        </ul>
      </div>
      <div class="col-md-3 text-left mt-2">
        <div id="copy text-left">© <a href="<?php echo get_settings('footer_link'); ?>" style="color: unset;"><?php echo get_settings('system_name'); ?></a> </div>
      </div>
      <div class="col-md-3 mt-2">
      </div>
    </div>
  </div>
</footer>
<div class="giuseart-nav">
	<ul>
		<li><a href="<?php echo get_settings('maps')?>" rel="nofollow" target="_blank"><i class="ticon-heart"></i>Tìm đường</a></li>
		<li><a href="https://zalo.me/<?php echo str_replace(' ', '',str_replace('.', '',get_settings('zalo')))?>" rel="nofollow" target="_blank"><i class="ticon-zalo-circle2"></i>Chat Zalo</a></li>
		<li class="phone-mobile">
			<div class="pull-right phone-content">
				<span class="icon-v201 icon-hotline-support-v2"></span>
				<div class="header-phone hd_phone_support">
					<p class="row-1"><?php echo get_settings('phone')?></p>
				</div>
			</div>
			<a href="tel:<?php echo str_replace(' ', '',str_replace('.', '',get_settings('phone')))?>" rel="nofollow" class="button">
				<span class="phone_animation animation-shadow">
					<i class="icon-phone-w" aria-hidden="true"></i>
				</span>
				<span class="btn_phone_txt">Gọi điện</span>
			</a>
			
			
		</li>
		<li><a href="https://m.me/<?php echo get_settings('fanpage');?>" rel="nofollow" target="_blank"><i class="ticon-messenger"></i>Messenger</a></li>
		<li><a href="sms:<?php echo str_replace(' ', '',str_replace('.', '',get_settings('phone')))?>" class="chat_animation">
			<i class="ticon-chat-sms" aria-hidden="true" title="Nhắn tin sms"></i>
		Nhắn tin SMS</a>
		</li>
		<li class="to-top-pc">
			<a href="javascript:;" onclick="window.scrollTo(0,0);" rel="nofollow">
				<i class="ticon-angle-up" aria-hidden="true" title="Quay lên trên"></i>
			</a>
	</li>
</ul>
</div>
<script type="text/javascript">
    function switch_language(language) {
        $.ajax({
            url: '<?php echo site_url('home/site_language'); ?>',
            type: 'post',
            data: {language : language},
            success: function(response) {
                setTimeout(function(){ location.reload(); }, 500);
            }
        });
    }
	
</script>