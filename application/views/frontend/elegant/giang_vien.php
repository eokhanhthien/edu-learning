<?php
$banners = themeConfiguration(get_frontend_settings('theme'), 'banners');
$privacy_policy_banner = $banners['privacy_policy_banner'];
?>
<div class="container margin_20_0">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Giảng Viên</h2>
		<p>Đội ngũ Giảng viên là những người đã có nhiều năm làm thực tế các các loại hình doanh nghiệp khác nhau, cùng với kỹ năng giảng dạy hiện đại. </p>
	</div>
	<div class="row justify-content-center">
		<?php 
		foreach ($instructors as $instructor_details):?>
		<div class="col-lg-3 col-md-4 wow" data-wow-offset="150">
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
	<hr>
</div>

