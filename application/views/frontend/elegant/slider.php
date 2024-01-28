<?php
	$latest_courses = $this->crud_model->get_latest_10_course();
	$limit = 4;
 ?>
<section class="slider">
	<div id="slider" class="flexslider">
		<ul class="slides">
			<?php foreach ($banners as $key => $banner) : ?>
				<?php if ($limit > $key): ?>
					<li>
						<a href="<?php echo $banner['discount_percentage']; ?>" title="<?php echo $banner['code']; ?>" alt="<?php echo $banner['code']; ?>"><img src="<?php echo 'uploads/banners/'.$banner['expiry_date']; ?>" alt=""></a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<div id="icon_drag_mobile"></div>
	</div>
</section>
