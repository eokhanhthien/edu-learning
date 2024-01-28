<!-- Favicons-->
<link name="favicon" type="image/x-icon" href="<?php echo base_url().'uploads/system/'.get_frontend_settings('favicon'); ?>" rel="shortcut icon" />
<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

<!-- GOOGLE WEB FONT
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,500,600,700,800&display=swap" rel="stylesheet">
--><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,100;1,300;1,400&display=swap" rel="stylesheet">
<!-- font awesome 5 -->
<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/elegant/css/fontawesome-all.min.css'; ?>">

<!-- BASE CSS -->
<link href="<?php echo base_url('assets/frontend/elegant/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend/elegant/css/style.css'); ?>?_<?php echo time();?>" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend/elegant/css/vendors.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend/elegant/css/icon_fonts/css/all_icons.min.css'); ?>" rel="stylesheet">

<!-- SPECIFIC CSS For Course Page-->
<link href="<?php echo base_url('assets/frontend/elegant/css/skins/square/grey.css'); ?>" rel="stylesheet">

<!-- TOASTR -->
<link rel="stylesheet" href="<?php echo base_url().'assets/global/toastr/toastr.css' ?>">
<!-- YOUR CUSTOM CSS -->
<link href="<?php echo base_url('assets/frontend/elegant/css/custom.css'); ?>" rel="stylesheet">
<style>
	.main-menu .login_headers{display:none;}
	@media (max-width: 991px){
	#top-bar,ul#top_menu li.login_header{
    display:none;
	}
	.main-menu .login_headers{display:inline-block;}
	ul#top_menu {
    margin-top: 0px !important;
    margin-bottom: 0px;
	}
	}
</style>