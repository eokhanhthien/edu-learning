<?php
$category_details = $this->crud_model->get_exam_category_details_by_id($category_id)->row_array();
?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box ">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Cập nhật danh mục loại đề thi</h4>
    </div>
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <h4 class="mb-3 header-title">Danh mục loại đề thi</h4>

          <form class="required-form" action="<?php echo site_url('admin/exam_categories/edit/'.$category_id); ?>" method="post">
            <div class="form-group">
              <label for="code"><?php echo get_phrase('category_code'); ?></label>
              <input type="text" class="form-control" id="code" name = "code" value="<?php echo $category_details['code']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="name"><?php echo get_phrase('category_title'); ?><span class="required">*</span></label>
              <input type="text" class="form-control" id="name" name = "name" value="<?php echo $category_details['name']; ?>" required>
            </div>

            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="fa fa-save"></i> <?php echo get_phrase("submit"); ?></button>
            <a href="<?=site_url('admin/exam_categories'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Quay lại</a>
          </form>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

