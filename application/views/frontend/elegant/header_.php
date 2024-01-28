<header class="header menu_2 d-print-none">
	<div id="top-bar" class="header-top hide-for-sticky nav-dark">
		<div class="flex-row container">
			<div class="flex-col hide-for-medium flex-left">
				<ul class="nav nav-left medium-nav-center nav-small  nav-divided">
				<li class="html custom html_topbar_left"><strong class="uppercase"><?php echo get_settings('slogan_top');  ?></strong></li>          </ul>
			</div><!-- flex-col left -->
			
			<div class="flex-col hide-for-medium flex-right">
				<ul class="nav top-bar-nav nav-right nav-small  nav-divided">
					<li id="menu-item-862" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-862"><a href="<?php echo site_url('home/bai-viet/gioi-thieu-ve-clc/3')?>" class="nav-top-link">Giới thiệu về CLC</a></li>|
					<li id="menu-item-863" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item  menu-item-863"><a href="<?php echo site_url('home/giang_vien')?>" class="nav-top-link">Giảng viên CLC</a></li>|
					<li id="menu-item-863" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item  menu-item-863"><a href="<?php echo site_url('home/bai-viet/tai-lieu/4')?>" class="nav-top-link">Tài liệu</a></li>
				</ul>
				
			</div>
		</div><!-- .flex-row -->
	</div>
	<style>
		.flex-row {
		-js-display: flex;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-flow: row nowrap;
		flex-flow: row nowrap;
		-ms-flex-align: center;
		align-items: center;
		-ms-flex-pack: justify;
		justify-content: space-between;
		width: 100%;
		}
		div#top-bar a {
		color: white;
		font-size: 13px;
		}
		.nav li:first-child {
		margin-left: 0 !important;
		}
		div#top-bar a {
		color: white;
		font-size: 13px;
		}
		.nav>li {
		display: inline-block;
		list-style: none;
		margin: 0;
		padding: 0;
		position: relative;
		margin: 0 7px;
		transition: background-color .3s;
		}
		@media (min-width: 850px){
		.nav-divided>li {
		margin: 0 .7em;
		}
		}
		.nav-small .nav>li>a, .nav.nav-small>li>a {
		vertical-align: top;
		padding-top: 5px;
		padding-bottom: 5px;
		font-weight: normal;
		}
		.flex-right {
		margin-left: auto;
		}
		.flex-left {
		margin-right: auto;
		}
		.flex-col {
		max-height: 100%;
		}
		.sticky .header-top {display:none;}
		.header-top {
		background-color: #931d1d!important;
		color: #fff;
		}
		.header-top {
		padding: 4px 0;
		}
		
element.style {
}
.nav-right {
    -ms-flex-pack: end;
    justify-content: flex-end;
}
.nav {
    width: 100%;
    position: relative;
    display: inline-block;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
}
	</style>
	<div class="container">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url().'uploads/system/'.get_frontend_settings('dark_logo'); ?>" height="55" data-retina="true" alt=""></a>
		</div>
		<ul id="top_menu">
			<li><a href="<?php echo site_url('home/shopping_cart'); ?>" class="shopping_cart"><?php echo site_phrase('shopping_cart'); ?></a></li>
			<li><a href="#0" class="search-overlay-menu-btn"><?php echo site_phrase('search'); ?></a></li>
			<?php if ($this->session->userdata('user_login') == 1 || $this->session->userdata('admin_login') == 1): ?>
			<li style="display:none"><a href="<?php echo site_url('login/logout'); ?>" class="btn_1 rounded"><?php echo site_phrase('log_out'); ?></a></li>
			<?php else: ?>
			<li class="login_header"><a href="<?php echo site_url('home/login'); ?>" class="btn_1 rounded"><?php echo site_phrase('login'); ?></a></li>
			
			
			<?php endif; ?>
		</ul><style>ul#top_menu {
    margin-top: 9px;
    margin-bottom: 11px;
}</style>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu">
			<ul>
				<!--<li><span><a href="<?php echo site_url('home'); ?>"><?php echo site_phrase('home'); ?></a></span></li>-->
				<li>
					<span><a href="javascript::"><?php echo site_phrase('courses'); ?><i class="icon-down-dir"></i></a></span>
					<ul>
						<?php
							$parent_categories = $this->crud_model->get_categories()->result_array();
						foreach ($parent_categories as $key => $parent_category): ?>
						<li><span><a href="<?php echo site_url('home/courses?category='.$parent_category['slug']); ?>"><?php echo $parent_category['name']; ?></a></span></li>
						<?php endforeach; ?>
						<li class="highlighter-menu"><span><a href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></span></li>
						<?php if(addon_status('course_bundle')): ?>
						<li class="highlighter-menu"><a href="<?php echo site_url('course_bundles'); ?>"><?php echo site_phrase('course_bundles'); ?></a></li>
						<?php endif; ?>
					</ul>
				</li>
				<?php
					$menu_root = $this->crud_model->get_menu_sub(0)->result_array();
					foreach ($menu_root as $key => $menu){ 
						$sub_menu= $this->crud_model->get_menu_sub($menu['id'])->result_array();
						if($sub_menu){
							echo '<li><span><a href="javascript::" title="'.$menu['name'].'" alt="'.$menu['name'].'">'.$menu['name'].'<i class="icon-down-dir"></i></a></span><ul>';
							foreach ($sub_menu as $key => $menus){
								if(!strpos($menus['url'],'http'))$menus['url'] = site_url($menus['url']);
								echo '<li><span><a href="'.$menus['url'].'" title="'.$menus['name'].'" alt="'.$menus['name'].'">'.$menus['name'].'</a></span></li>';
							}
							echo '</ul></li>';
							}else{
						?>
						<li><span><a href="<?php echo $menu['url']; ?>" title="<?php echo $menu['name']; ?>" alt="<?php echo $menu['name']; ?>"><?php echo $menu['name']; ?></a></span></li>
						<?php 
						}
					}
				?>
			<?php if ($this->session->userdata('admin_login') == 1): ?>
			<li><span><a href="<?php echo site_url('admin'); ?>"><?php echo site_phrase('administrator'); ?></a></span>
			<ul>
			<a href="<?php echo site_url('login/logout'); ?>" class="btn_1 rounded"><?php echo site_phrase('log_out'); ?></a>
			</ul>
			</li>
			<?php endif; ?>
			
			<!-- Show an onrdinary students options -->
			<?php if ($this->session->userdata('user_login') == 1): ?>
			<li>
			<span><a href="javascript::"><?php echo site_phrase('manage_account'); ?></a></span>
			<ul>
			<?php
			if($this->session->userdata('is_instructor')){
			?>
			<li><a href="<?php echo site_url('user'); ?>"><?php echo site_phrase('instructor'); ?></a></li>
			<?php }?>
			<li><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('my_courses'); ?></a></li>
			<?php if(addon_status('course_bundle')): ?>
			<li><a href="<?php echo site_url('home/my_bundles'); ?>"><?php echo site_phrase('my_bundles'); ?></a></li>
			<?php endif; ?>
			<li><a href="<?php echo site_url('home/my_wishlist'); ?>"><?php echo site_phrase('my_wishlist'); ?></a></li>
			<li><a href="<?php echo site_url('home/my_messages'); ?>"><?php echo site_phrase('my_messages'); ?></a></li>
			<li><a href="<?php echo site_url('home/purchase_history'); ?>"><?php echo site_phrase('purchase_history'); ?></a></li>
			<li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo site_phrase('user_profile'); ?></a></li>
			<li><a href="<?php echo site_url('login/logout'); ?>" class="btn_1 rounded"><?php echo site_phrase('log_out'); ?></a></li>
			</ul>
			</li>
			<?php endif; ?>
			<li class="login_headers"><a href="<?php echo site_url('home/login'); ?>" class="btn_1 rounded"><?php echo site_phrase('login'); ?></a></li>
			</ul>
			</nav>
			<!-- Search Menu -->
			<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<form action="<?php echo site_url('home/search'); ?>" role="search" id="searchform" method="get">
			<input value="" name="query" type="search" placeholder="<?php echo site_phrase('search'); ?>..." />
			<button type="submit"><i class="icon_search"></i>
			</button>
			</form>
			</div><!-- End Search Menu -->
			</div><!-- End Search Menu -->
			</header>
						