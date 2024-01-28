<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>Menu
                    <a href="<?php echo site_url('admin/cat_new'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle">Quay lại</a>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('menu_add_form'); ?></h4>
					
                    <form class="required-form" action="<?php echo site_url('admin/menu/add'); ?>" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
                            <label for="name">Tên hiển thị<span class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
						</div>
						
						<div class="form-group">
                            <label for="sub">Sắp xếp</label>
                            <div class="input-group">
								<select class="form-control select2" data-toggle="select2" name="sub" id="sub" required>
									<option value="0">Menu Chính</option>
									<?php foreach ($menus as  $key => $sub): ?>
									<option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
                            <label for="get_url">Chọn Liên kết</label>
                            <div class="input-group">
								<select class="form-control select2" data-toggle="select2" id="get_url">
									<option>Chọn liên kết</option>
									 <optgroup label="Danh Mục">
									<?php foreach ($cat as  $key => $sub): ?>
									<option data-url="<?php echo site_url('danh-muc/'.slugify($sub['name']).'/'.$sub['id']);?>" data-name="<?php echo $sub['name']; ?>" value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
									<?php endforeach; ?>
									
									 </optgroup>
									 <optgroup label="Bài viết">
									 <?php foreach ($news as  $key => $news): ?>
									<option data-url="<?php echo site_url('bai-viet/'.slugify($news['name']).'/'.$news['id']);?>" data-name="<?php echo $news['name']; ?>" value="<?php echo $news['id']; ?>"><?php echo $news['name']; ?></option>
									<?php endforeach; ?>
									
									 </optgroup>
								</select>
							</div>
						</div>
						<div class="form-group">
                            <label for="url">Hoạc Đường dẫn</label>
                            <div class="input-group">
                                <input type="text" name="url" id="url" class="form-control" value="" required>
							</div>
						</div>
						
						<div class="form-group">
                            <label for="thutu">Thứ tự</label>
                            <div class="input-group">
                                <input type="text" name="sort" id="thutu" class="form-control" value="" required>
							</div>
						</div>
                        <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
					</form>
				</div>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
<script>
    function generateARandomcat_newCode() {
        var randomcat_newCode;
        randomcat_newCode = randomString(7);
	$('#code').val(randomcat_newCode);
    }
    function randomString(len) {
	var p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	return [...Array(len)].reduce(a => a + p[~~(Math.random() * p.length)], '');
    }
	</script>	