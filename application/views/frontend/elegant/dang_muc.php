<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$privacy_policy_banner = $banners['privacy_policy_banner'];
?>
<div class="container margin_20_0">
	<div class="main_title_2">
		<span><em></em></span>
		<h2><?php echo $cat_new['name'];?></h2>
		<p><?php //echo site_phrase('pick_according_to_your_choice'); ?>.</p>
	</div>
	<div class="row justify-content-center">
		<?php
		// print_r($list_news);
		foreach ($list_news as $key => $new_news):?>
		<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
			<div class="box_grid">
				<figure>
					<a href="<?php echo site_url('home/bai-viet/'.slugify($new_news['name']).'/'.$new_news['id']); ?>">
					<div class="preview"><span>Chi tiết</span></div><img src="<?php echo site_url('uploads/news/').$new_news['thumb']; ?>" style="max-height: 250px;width: 100%;" class="img-fluid" alt=""></a>
					
				</figure>
				<a href="<?php echo site_url('home/bai-viet/'.slugify($new_news['name']).'/'.$new_news['id']); ?>">
				<div class="wrapper">
					<h3><?php echo $new_news['name'] ?></h3>
					<p><?php echo ellipsis($new_news['desc'], 150); ?></p>
				</div>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<hr>
</div>

