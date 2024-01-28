<?php
$exam_details = $this->crud_model->get_exam_details_by_id($exam_id)->row_array();
?>

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Cập nhật đề thi</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title">Thông tin đề thi</h4>

                <form class="required-form" action="<?php echo site_url('admin/exams/edit/'.$exam_id); ?>" method="post">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input class="form-control" type="text" value="<?php echo $exam_details['title']; ?>" placeholder="Nhập tên đề thi" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="duration"><?php echo get_phrase('quiz_time'); ?> (phút)</label>
                        <input class="form-control" type="number" value="<?php echo $exam_details['duration']; ?>"  min="1" name="duration" id="duration" placeholder="Nhập thời gian làm bài thi: 10 phút" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Danh mục loại đề thi</label>
                        <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($exam_details['category_id'] == $category['id']): ?>selected<?php endif; ?>><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="fa fa-save"></i> <?php echo get_phrase("submit"); ?></button>
                    <a href="<?=site_url('admin/exams'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Quay lại</a>
                    </div>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#category_id']);
});
</script>

