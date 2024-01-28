<!-- Slider starts -->
<?php include 'slider.php'; ?>
<!-- Slider ends -->

<!-- The black banner content starts -->
<div class="features clearfix">
	<div class="container">
		<ul>
		<?php foreach ($tieuchis as $key => $tieuchi) : ?>
			<li><img src="<?php echo 'uploads/system/'.$tieuchi['expiry_date']; ?>" alt="">
				<h4><?php echo $tieuchi['code']; ?></h4>
				<p><?php echo $tieuchi['discount_percentage']; ?></p>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<!-- The black banner content ends -->

<!-- Top Course Portion Starts -->
<?php include 'top_courses.php' ?>
<?php include 'top_new_courses.php' ?>
<?php include 'nguoi_huong_dan.php' ?>
<?php include 'top_news.php' ?>
<!-- Top Course Portion Ends -->
<?php if(1==2){?>
<!-- Categories start -->
<div class="container margin_30_95">
	<div class="main_title_2">
		<span><em></em></span>
		<h2><?php echo site_phrase('categories'); ?></h2>
		<p><?php echo site_phrase('get_category_wise_different_courses'); ?></p>
	</div>
	<div class="row justify-content-center">
		<?php foreach ($this->crud_model->get_categories()->result_array() as $category):
			if($category['parent'] > 0)
			continue; ?>
			<!-- /grid_item -->
			<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
				<a href="<?php echo site_url('home/courses?category='.$category['slug']); ?>" class="grid_item">
					<figure class="block-reveal">
						<div class="block-horizzontal"></div>
						<img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/'.$category['thumbnail']); ?>" class="img-fluid" alt="">
						<div class="info">
							<small><i class="ti-layers"></i>
								<?php echo $this->crud_model->get_category_wise_courses($category['id'])->num_rows().' '.site_phrase('courses'); ?>
							</small>
							<h3><?php echo $category['name']; ?></h3>
						</div>
					</figure>
				</a>
			</div>
			<!-- /grid_item -->
		<?php endforeach; ?>
	</div>
</div>
<!-- Categories end -->
<?php }?>
