<!-- start page title -->
<?php 
$grammar = $this->db->get('grammars')->result_array();   
$grammar_child = $this->crud_model->get_child_grammars();

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

                <form class="required-form" action="<?php echo site_url('admin/grammar_lessons/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="code"><?php echo get_phrase('category_code'); ?></label>
                        <input type="text" class="form-control" id="code" name = "code" value="<?php echo substr(md5(rand(0, 1000000)), 0, 10); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="grammar_id">Danh muc<span class="required">*</span></label>

                        <select name="grammar_id" id="grammar_id" class="form-control">
                            <?php foreach ($grammar_child as $grammar) : ?>
                                <option value="<?= $grammar['id']; ?>"><?= $grammar['name']; ?></option>
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
                    <a href="<?=site_url('admin/grammar_lessons'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Quay lại</a>
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
    // Thêm select 2 grammar_id
    $(document).ready(function() {
        $('#grammar_id').select2();
    });
</script>