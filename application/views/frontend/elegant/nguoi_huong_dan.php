<div class="container margin_20_0">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Giảng Viên</h2>
	</div>
<div class="flexslider carousel">
  	<div class="owl-carousel-divs owl-carousel owl-theme">
		<?php 
		foreach ($instructors as $instructor_details):?>
		<div class="item col-md-12 wow"">
			<div class="box_grid">
				<figure>
					<a href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']); ?>">
				<img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" style="max-height: 250px;width: 100%;border-radius: 50%;" class="img-fluid" alt=""></a>
					
				</figure>
				<a href="<?php echo site_url('home/instructor_page/'.$instructor_details['id']); ?>">
				<div class="wrapper">
					<h3><em style="font-size: 13px;">Giảng Viên</em> <?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h3>
					<p><?php echo ellipsis(strip_tags($instructor_details['biography']), 150); ?></p>
				</div>
				</a>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
</div>