<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/cat_new'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><?php echo get_phrase('back_to_cat_new'); ?></a>
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
                    <h4 class="mb-3 header-title"><?php echo get_phrase('cat_new_edit_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/cat_new/edit/' . $cat_new['id']); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="code">Tên hiển thị<span class="required">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" value="<?php echo $cat_new['code']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="discount_percentage">Nội dung</label>
                            <div class="input-group">
                                <input type="text" name="discount_percentage" id="discount_percentage" class="form-control" value="<?php echo $cat_new['discount_percentage']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">Hình Ảnh<span class="required">*</span></label>
							<input type="file" name="userfile" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>