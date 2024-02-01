<!-- start page title -->
<?php 
$vocabulary = $this->db->get('vocabulary')->result_array();   
$vocabulary_child = $this->crud_model->get_child_vocabulary();

?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Thêm bài học</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title">Thêm bài học</h4>

                <form class="required-form" action="<?php echo site_url('admin/vocabulary_lessons/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="code"><?php echo get_phrase('category_code'); ?></label>
                        <input type="text" class="form-control" id="code" name = "code" value="<?php echo substr(md5(rand(0, 1000000)), 0, 10); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="vocabulary_id">Danh muc<span class="required">*</span></label>

                        <select name="vocabulary_id" id="vocabulary_id" class="form-control">
                            <?php foreach ($vocabulary_child as $vocabulary) : ?>
                                <option value="<?= $vocabulary['id']; ?>"><?= $vocabulary['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Tên bài học<span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name"  required>
                    </div>

                    <div class="form-group">
                        <label for="lesson_number">Thứ tự bài học<span class="required">*</span></label>
                        <input type="text" class="form-control" id="lesson_number" name = "lesson_number"  required>
                    </div>


                    <div class="form-group">
                        <label for="content">Nội dụng<span class="required">*</span></label>
                        <!-- nhúng ckeditor cho tôi -->
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="fa fa-save"></i> <?php echo get_phrase("submit"); ?></button>
                    <a href="<?=site_url('admin/vocabulary_lessons'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Quay lại</a>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!-- nhúng ckeditor -->
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    // Thêm select 2 vocabulary_id
    $(document).ready(function() {
        $('#vocabulary_id').select2();
    });
</script>