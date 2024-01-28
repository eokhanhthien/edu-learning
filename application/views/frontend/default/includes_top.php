<link rel="favicon" href="<?php echo base_url() . 'assets/frontend/default/img/icons/favicon.ico' ?>">
<link rel="apple-touch-icon" href="<?php echo base_url() . 'assets/frontend/default/img/icons/icon.png'; ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php if ($page_name == "home") : ?>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/jquery.webui-popover.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/slick.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/slick-theme.css'; ?>">
<?php endif; ?>

<!-- font awesome 5 -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/fontawesome-all.min.css'; ?>">

<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/bootstrap.min.css'; ?>">

<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/main.css'; ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default/css/responsive.css'; ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&display=swap">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/global/toastr/toastr.css' ?>">
<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>"></script>
<style>
@media screen and (max-width: 767px){
.menu-area-bottom {
     display: block!important;
}

.menu-area .menu-area-bottom li a {
   
    padding: 0.5rem 0.5rem!important;
        font-size: 12px;

   
}

.menu-area .menu-area-bottom ul {
   display: inline-block;

}

.menu-area .menu-area-bottom ul li{
   float:left;

}

}

</style>