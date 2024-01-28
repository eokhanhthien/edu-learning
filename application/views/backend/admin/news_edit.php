<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/news'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><?php echo get_phrase('back_to_new'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('new_edit_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/news/edit/' . $news['id']); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Tên hiển thị<span class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $news['name']; ?>" required>
                        </div>

						<div class="form-group">
                            <label for="cat">Danh mục</label>
                            <div class="input-group">
								<select class="form-control select2" data-toggle="select2" name="cat" id="cat" required>
									<?php foreach ($cat as  $key => $sub): ?>
									<option<?php if($news['cat'] == $sub['id']) echo' selected'; ?> value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
                      <div class="form-group">
                            <label for="expiry_date">Hình Ảnh<span class="required">*</span></label>
							<input type="file" name="userfile" class="form-control" >
                        </div>
                         <div class="form-group">
                            <label for="discount_percentage">Giới thiệu</label>
                            <div class="input-group">
                                 <textarea id="editor2" class="form-control" name="desc" placeholder="Giới thiệu" required><?php echo $news['desc']; ?></textarea>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="discount_percentage">Nội dung</label>
                            <div class="input-group">
                                 <textarea id="area1" class="form-control" name="content" placeholder="Nội dung"><?php echo $news['content']; ?></textarea>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>